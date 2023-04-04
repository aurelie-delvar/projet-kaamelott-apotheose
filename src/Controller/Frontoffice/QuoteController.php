<?php

namespace App\Controller\Frontoffice;

use App\Repository\QuoteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QuoteController extends AbstractController
{
    /**
     * @Route("/citations", name="app_frontoffice_quotes_browse")
     */
    public function browse(QuoteRepository $quoteRepository, Request $request): Response
    {
        // we seek the url's page number
        $page = $request->query->getInt('page', 1); // if no number, 1 will be the default

        $quotes = $quoteRepository->findQuotesPaginated($page, 50);

        return $this->render('frontoffice/quote/index.html.twig', [
            "quotes" => $quotes,
        ]);
    }
}
