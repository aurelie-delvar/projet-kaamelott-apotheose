<?php

namespace App\Controller\Backoffice;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\AvatarRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="app_backoffice_user_browse", methods={"GET"})
     */
    public function browse(UserRepository $userRepository): Response
    {
        return $this->render('backoffice/user/browse.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/add", name="app_backoffice_user_add", methods={"GET", "POST"})
     */
    public function add(Request $request, UserRepository $userRepository, UserPasswordHasherInterface $userPasswordHasherInterface, AvatarRepository $avatarRepository): Response
    {
        $user = new User();

        $avatar = $avatarRepository->find(5);

        $user->setAvatar($avatar);

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $form->get("password")->getData();
            $passwordConfirmed = $form->get("password_confirmed")->getData();

            if($password === $passwordConfirmed){
                $hashedpassword = $userPasswordHasherInterface->hashPassword($user, $password);
                $user->setPassword($hashedpassword);

                $userRepository->add($user, true);
                
                return $this->redirectToRoute('app_backoffice_user_browse', [], Response::HTTP_SEE_OTHER);
            }
            
            $form->addError(new FormError("Les mots de passe ne correspondent pas."));
   
        }

        return $this->renderForm('backoffice/user/add.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_user_read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(User $user): Response
    {
        return $this->render('backoffice/user/read.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_backoffice_user_edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, User $user, UserRepository $userRepository, UserPasswordHasherInterface $userPasswordHasherInterface): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            if ($form->get("password")->getData())
            {
                $password = $form->get("password")->getData();
                $hashedpassword = $userPasswordHasherInterface->hashPassword($user, $password);
                $user->setPassword($hashedpassword);
            }
            
            $userRepository->add($user, true);

            return $this->redirectToRoute('app_backoffice_user_browse', [], Response::HTTP_SEE_OTHER);
        }
        
        return $this->renderForm('backoffice/user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
        
    }

    /**
     * @Route("/{id}", name="app_backoffice_user_delete", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, User $user, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user, true);
        }

        // I had to add these lines because a error occured due to the session still standing
        if ($this->getUser() == $user){
            $request->getSession()->invalidate();
            $this->container->get('security.token_storage')->setToken(null);
    
            return $this->redirectToRoute('default', [], Response::HTTP_SEE_OTHER);
        }
        
        return $this->redirectToRoute('app_backoffice_user_browse', [], Response::HTTP_SEE_OTHER);
    }
}
