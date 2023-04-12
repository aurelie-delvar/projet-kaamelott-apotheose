<?php

namespace App\Controller\Frontoffice;

use App\Entity\Favorite;
use App\Repository\QuoteRepository;
use App\Repository\FavoriteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class FavoriteController extends AbstractController
{
    /**
     * @Route("/frontoffice/favorite", name="app_frontoffice_favorite")
     */
    public function browse(FavoriteRepository $favoriteRepository): Response
    {

        $favoris = $favoriteRepository->findAll();

        return $this->render('frontoffice/favorite/index.html.twig', [
            "favoris" => $favoris,
        ]);
    }

    /**
     * @Route("/favoris/{id}", name="app_frontoffice_quotes_addFavorite", requirements={"id" : "\d+"}, methods={"GET", "POST"})
     */
    public function addFavorite(QuoteRepository $quoteRepository, $id, FavoriteRepository $favoriteRepository, Request $request, UserInterface $user, EntityManagerInterface $manager): Response
    {

        $quote = $quoteRepository->find($id);

        if(!$quote) {
            throw new NotFoundHttpException("Pas de citation trouvée");
        }

        $user->getUserIdentifier();
        
        $newFavorite = new Favorite();
        $newFavorite->setUser($user);
        $newFavorite->setQuote($quote);

        $manager->persist($newFavorite);

        $manager->flush();

        $route = $_SERVER['HTTP_REFERER'];
        // dd($request);
        // dd($newFavorite);
        //dd ($route);
        // $essai = $quote->addFavorite($newFavorite);

        // ! https://stackoverflow.com/questions/12369615/serverhttp-referer-missing
        return $this->redirect($_SERVER['HTTP_REFERER']);
        
    }

    /**
     * @Route("/favoris/delete/{id}", name="app_frontoffice_quotes_removeFavorite", requirements={"id" : "\d+"})
     */
    public function removeFavorite( $id, FavoriteRepository $favoriteRepository, Request $request, UserInterface $user, EntityManagerInterface $manager): Response
    {

        // $quote = $quoteRepository->find($id);
        
        $favoris = $favoriteRepository->find($id);
        // dd($favoris);
        // if(!$quote) {
        //     throw new NotFoundHttpException("Pas de citation trouvée");
        // }

        // $user->getUserIdentifier();
        // $newFavorite = new Favorite();
        // $newFavorite->setUser($user);
        // $newFavorite->setQuote($quote);
        // $favoriteRepository->remove($favoris);
        
        

        // $manager->persist($favoris);

        $manager->flush();

        $route = $_SERVER['HTTP_REFERER'];
        // dd($request);
        // dd($newFavorite);
        // dd ($route);
        // $essai = $quote->addFavorite($newFavorite);

        // ! https://stackoverflow.com/questions/12369615/serverhttp-referer-missing
        return $this->redirect($_SERVER['HTTP_REFERER']);
        
    }
}
