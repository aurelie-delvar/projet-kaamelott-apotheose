<?php

namespace App\Controller\Frontoffice;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use App\Repository\QuoteRepository;
use App\Repository\AvatarRepository;
use App\Repository\PlayQuizzRepository;
use App\Security\KaamelottAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class UserController extends AbstractController
{

                                                        // FAVORITE PARTS //
    /**
     * @Route("/favoris/{userId}", name="app_favorites_user")
     */
    public function index(): Response
    {

        return $this->render('frontoffice/user/indexFav.html.twig', [
            
        ]);
    }

    /**
     * @Route("/favorite-quotes/add/{quoteId}", name="user_add_favorite_quote")
     */
    public function addFavorite(EntityManagerInterface $entityManager, Security $security, int $quoteId, QuoteRepository $quoteRepository): Response
    {
        
        // je récupère le User s'il est connecté
        $user = $security->getUser();
        // je récupère la quote grâce à son id
        $quote = $quoteRepository->find($quoteId);
        // dd($user);
        if (!$user) {
            throw $this->createNotFoundException('L\'utilisateur doit être connecté pour ajouter une citation en favori.');
        }

        if (!$quote) {
            throw $this->createNotFoundException('La citation demandée n\'existe pas.');

        }
        // $user -> setUser($currentUser);
        // $users = $quoteRepository -> find($quote) -> getUsers();
        $user->addFavoriteQuote($quote);
        $entityManager->flush();

        // dd($users);

        return $this->redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * @Route("/favorite-quotes/remove/{quoteId}", name="user_remove_favorite_quote")
     */
    public function removeFavorite(EntityManagerInterface $entityManager, Security $security, int $quoteId, QuoteRepository $quoteRepository): Response
    {
        
        // je récupère le User s'il est connecté
        $user = $security->getUser();
        // je récupère la quote grâce à son id
        $quote = $quoteRepository->find($quoteId);
        // dd($user);
        if (!$user) {
            throw $this->createNotFoundException('L\'utilisateur doit être connecté pour retirer une citation en favori.');
        }

        if (!$quote) {
            throw $this->createNotFoundException('La citation demandée n\'existe pas.');

        }
        // $user -> setUser($currentUser);
        $users = $quoteRepository -> find($quote) -> getUsers();
        $user->removeFavoriteQuote($quote);
        $entityManager->flush();

        // dd($users);

        return $this->redirect($_SERVER['HTTP_REFERER']);
    }


                                                        // PROFILE PARTS //

    /**
     * @Route("/inscription", name="app_register")
     */
    public function register(AvatarRepository $avatarRepository, Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, KaamelottAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new User();

        $user->setRoles(["ROLE_USER"]);

        $avatar = $avatarRepository->find(5);

        $user->setAvatar($avatar);

        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

                // encode the plain password
                $user->setPassword(
                    $userPasswordHasher->hashPassword(
                        $user,
                        $form->get('plainPassword')->getData()
                    )
                );

                $entityManager->persist($user);
                $entityManager->flush();

                return $userAuthenticator->authenticateUser(
                    $user,
                    $authenticator,
                    $request
                );
        }   

        return $this->render('frontoffice/user/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
    
    
    /**
     * User's profile
     *
     * @Route("/utilisateur/{id}/profil", name="user_read_profile", requirements={"id" = "\d+"})
     */
    public function read(UserRepository $userRepository, $id, User $user, PlayQuizzRepository $playQuizzRepository) : Response
    {
        if($this->getUser() !== $user) {
            throw $this->createAccessDeniedException("Vous n'êtes pas autorisé ici.");
        }

        $user = $userRepository->find($id);
       
        $scoreArray = $playQuizzRepository->displayScore($id);

        return $this->render('frontoffice/user/profile.html.twig', [
            'user' => $user,
            'scoreArray' => $scoreArray
        ]);
    }

    /**
     * Edit user's profile
     * 
     * @Route("/utilisateur/{id}/edition-profil", name ="user_edit_profile", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(User $user, Request $request, UserPasswordHasherInterface $userPasswordHasherInterface, UserRepository $userRepository) : Response
    {

        if($this->getUser() !== $user) {
            throw $this->createAccessDeniedException("Vous n'êtes pas autorisé ici.");
        }

        $form = $this->createForm(RegistrationFormType::class, $user);
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $password = $form->get("plainPassword")->getData();
            $hashedpassword = $userPasswordHasherInterface->hashPassword($user, $password);
            $user->setPassword($hashedpassword);
            
            $userRepository->add($user, true);

            return $this->redirectToRoute("user_read_profile", ['id' => $user->getId()], Response::HTTP_SEE_OTHER);

        }

        return $this->renderForm('frontoffice/user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);

    }
}
