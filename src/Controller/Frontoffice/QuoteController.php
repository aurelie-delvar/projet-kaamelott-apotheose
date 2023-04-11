<?php

namespace App\Controller\Frontoffice;

use App\Entity\User;
use App\Entity\Favorite;
use App\Repository\QuoteRepository;
use App\Repository\FavoriteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class QuoteController extends AbstractController
{
    /**
     * @Route("/citations", name="app_frontoffice_quotes_browse")
     */
    public function browse(QuoteRepository $quoteRepository, Request $request, PaginatorInterface $paginator): Response
    {

        $pagination = $paginator->paginate(
            $quoteRepository->paginationQuery(),
            $request->query->get('page', 1),
            10,
        );

        return $this->render('frontoffice/quote/index.html.twig', [
            "pagination" => $pagination,
        ]);
    }

    /**
     * @Route("/favoris/{id}", name="app_frontoffice_quotes_addFavorite", requirements={"id" : "\d+"})
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

        // dd($newFavorite);

        // $essai = $quote->addFavorite($newFavorite);


        return $this->redirectToRoute("default");
        // return $this->redirectToRoute("app_home_show", ["id" => $movie->getId(), "slug" => $movie->getSlug()]);
    }
}
