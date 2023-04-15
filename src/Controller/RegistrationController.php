<?php

namespace App\Controller;

use App\Entity\Avatar;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\KaamelottAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/inscription", name="app_register")
     */
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, KaamelottAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new User();

        $user->setRoles(["ROLE_USER"]);

        // $avatar = new Avatar();
        // $avatar->getName();
        // $avatar->setName();
        // dd($avatar);
        // $user->setAvatar($avatar);
        // dd($user);

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

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
