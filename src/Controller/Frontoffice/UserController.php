<?php

namespace App\Controller\Frontoffice;

use App\Entity\Rate;
use App\Entity\User;
use App\Form\RatingType;
use App\Repository\QuoteRepository;
use App\Repository\RateRepository;
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
    public function addRating(EntityManagerInterface $entityManager, Security $security, Request $request, int $quoteId, QuoteRepository $quoteRepository, RateRepository $rateRepository): Response
    {
        
        // je récupère le User s'il est connecté
        $user = $security->getUser();
        
        // je récupère la quote grâce à son id
        $quote = $quoteRepository->find($quoteId);
        // dd($quote);//

        $averageRatingQuote = $rateRepository -> averageRating($quote);
        // dd($averageRatingQuote);

        if (!$user) {
            throw $this->createNotFoundException('L\'utilisateur doit être connecté pour noter une citation en favori.');
        }

        if (!$quote) {
            throw $this->createNotFoundException('La citation demandée n\'existe pas.');

        }

        $newRating = new Rate();
        //rajout user_id et quote_id
        $newRating ->setUser($user);
        $newRating -> setQuote($quote);
        $form = $this->createForm(RatingType::class, $newRating);
        
        
        
// dd($request);
        $form->handleRequest($request);
        // dd($form);
        if ($form->isSubmitted() && $form->isValid())
        {
            // TODO : persist + flush
            // il nous manque l'association avec la citation
            $newRating->setQuote($quote); //on a la note du form
            // dd($newRating);

            $quoteRating = $quoteRepository->find($quoteId);
            
            $quoteRating -> addRate($newRating);
            // dd($quoteRating);
            // dd($rateRepository);

            // TODO : recalcul du rating

            // $averageRatingQuote ->setRating($newRating);

            // redirection
            return $this->redirectToRoute('default');
        }

              

        return $this->renderForm('frontoffice/user/formRating.html.twig', [
            "formulaire" => $form,
            "quote" => $quote
        ]);
    }






}
