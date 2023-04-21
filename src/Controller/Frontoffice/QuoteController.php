<?php

namespace App\Controller\Frontoffice;

use App\Repository\QuoteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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


}
