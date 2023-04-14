<?php

namespace App\Controller\Frontoffice;

use App\Entity\Rate;
use App\Entity\User;
use App\Repository\QuoteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
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


    /**
     * @Route("/quote-rating/add/{quoteId}", name="user_add_rating_quote")
     */
    public function addRating(EntityManagerInterface $entityManager, Security $security, Request $request, int $quoteId, QuoteRepository $quoteRepository): Response
    {
        
        // je récupère le User s'il est connecté
        $user = $security->getUser();
        // je récupère la quote grâce à son id
        $quote = $quoteRepository->find($quoteId);
        // dd($user);
        if (!$user) {
            throw $this->createNotFoundException('L\'utilisateur doit être connecté pour noter une citation en favori.');
        }

        if (!$quote) {
            throw $this->createNotFoundException('La citation demandée n\'existe pas.');

        }

        $newRating = new Rate();
        $form = $this->createForm(RatingType::class, $newRating);

        $form->handleRequest($request);

        // $user -> setUser($currentUser);
        // $users = $quoteRepository -> find($quote) -> getUsers();
        $user->addRate($rating);
        $entityManager->flush();

        // dd($users);

        return $this->redirect($_SERVER['HTTP_REFERER']);


        

        // on récupère les infos du formulaire, et on met à jour notre entité $newReview
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            // TODO : persist + flush
            // il nous manque l'association avec le film
            $newReview->setMovie($movieFromRoute);

            // TODO : recalcul du rating

            $reviewRepository->add($newReview, true);

            // redirection
            return $this->redirectToRoute('app_home_show', ["id" => $movieFromRoute->getId(),"slug" => $movieFromRoute->getSlug()]);
        }

        return $this->renderForm('review/index.html.twig', [
            "formulaire" => $form,
            "movie" => $movieFromRoute
        ]);
    }






}
