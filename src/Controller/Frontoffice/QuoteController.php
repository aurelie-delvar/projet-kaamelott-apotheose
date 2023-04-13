<?php

namespace App\Controller\Frontoffice;

use App\Entity\User;
use App\Entity\Favorite;
use App\Repository\QuoteRepository;
use App\Repository\FavoriteRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
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
    public function browse(QuoteRepository $quoteRepository, Request $request, Security $security, PaginatorInterface $paginator): Response
    {
        // je récupère le User s'il est connecté
        $user = $security->getUser();
        $pagination = $paginator->paginate(
            $quoteRepository->paginationQuery(),
            $request->query->get('page', 1),
            10,
        );
// dd($pagination);
        return $this->render('frontoffice/quote/index.html.twig', [
            "pagination" => $pagination,
            "user" => $user,
        ]);
    }


}
