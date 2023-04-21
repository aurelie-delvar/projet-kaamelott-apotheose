<?php

namespace App\Controller\Frontoffice;


use App\Entity\Rate;
use App\Entity\User;
use App\Form\RatingType;
use App\Form\RegistrationFormType;
use App\Repository\RateRepository;
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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class UserController extends AbstractController
{

                                                        // FAVORITE PARTS //
    /**
     * @Route("/favoris/{id}", name="app_frontoffice_quotes_favorites_user", requirements={"id" = "\d+"})
     * @IsGranted("ROLE_USER")
     */
    public function index(User $user): Response
    {
        if($this->getUser() !== $user) {
            throw $this->createAccessDeniedException("Vous n'êtes pas autorisé ici.");
        } 
     
        return $this->render('frontoffice/user/indexFav.html.twig', [
            "user" => $user,
        ]);
    }

    /**
     * @Route("/citations-favorites/ajout/{quoteId}", name="app_frontoffice_quotes_addFavorite", requirements={"id" = "\d+"})
     */
    public function addFavorite(EntityManagerInterface $entityManager, Security $security, int $quoteId, QuoteRepository $quoteRepository): Response
    {
        $user = $security->getUser();
        $quote = $quoteRepository->find($quoteId);
    
        if (!$user) {
            throw $this->createNotFoundException('L\'utilisateur doit être connecté pour ajouter une citation en favori.');
        }

        if (!$quote) {
            throw $this->createNotFoundException('La citation demandée n\'existe pas.');

        }
        
        $user->addFavoriteQuote($quote);
        $entityManager->flush();

        return $this->redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * @Route("/citations-favorites/supprimer/{quoteId}", name="app_frontoffice_quotes_removeFavorite", requirements={"id" = "\d+"})
     */
    public function removeFavorite(EntityManagerInterface $entityManager, Security $security, int $quoteId, QuoteRepository $quoteRepository): Response
    {

        $user = $security->getUser();
 
        $quote = $quoteRepository->find($quoteId);
       
        if (!$user) {
            throw $this->createNotFoundException('L\'utilisateur doit être connecté pour retirer une citation en favori.');
        }

        if (!$quote) {
            throw $this->createNotFoundException('La citation demandée n\'existe pas.');

        }
        
        $user->removeFavoriteQuote($quote);
        $entityManager->flush();

        

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
     * @Route("/utilisateur/{id}/edition", name ="user_edit_profile", methods={"GET", "POST"}, requirements={"id"="\d+"})
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

    /**
     * For the user to delete his own profile
     * 
     * @Route("utilisateur/{id}/suppression", name="user_delete_profile", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function delete(User $user, Request $request, UserRepository $userRepository) : Response
    {
        if($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user, true);
        }

        // I had to add these lines because a error occured due to the session still standing
        $request->getSession()->invalidate();
        $this->container->get('security.token_storage')->setToken(null);

        return $this->redirectToRoute('default', [], Response::HTTP_SEE_OTHER);
    }

                                                        // RATING PARTS //
    /**
     * @Route("/citation-noter/ajout/{quoteId}", name="user_add_rating_quote", requirements={"quoteId" = "\d+"})
     */
    public function addRating(EntityManagerInterface $entityManager, Security $security, Request $request, int $quoteId, QuoteRepository $quoteRepository, RateRepository $rateRepository): Response
    {        
        $user = $security->getUser();
        
        $quote = $quoteRepository->find($quoteId);

        if (!$user) {
            throw $this->createNotFoundException('L\'utilisateur doit être connecté pour noter une citation en favori.');
        }

        if (!$quote) {
            throw $this->createNotFoundException('La citation demandée n\'existe pas.');

        }

        $newRating = new Rate();

        // $newRating ->setUser($user);
        // $newRating -> setQuote($quote);
        $form = $this->createForm(RatingType::class, $newRating);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            // we set the user and the quote to the rating, we persist and flush
            $newRating ->setUser($user);
            $newRating->setQuote($quote); 
            $entityManager->persist($newRating);
            $entityManager->flush();

            // we get the average rating to put it in the quote (stars)
            $averageRatingQuote = $rateRepository -> averageRating($quoteId);
            $quote -> setRating($averageRatingQuote);
            $entityManager->persist($quote);
            $entityManager->flush();
            
            return $this->redirectToRoute('default');
        }

        return $this->renderForm('frontoffice/user/formRating.html.twig', [
            "formulaire" => $form,
            "quote" => $quote
        ]);
    }

}
