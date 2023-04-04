<?php

namespace App\Controller\Frontoffice;

use App\Repository\QuoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuoteController extends AbstractController
{
    /**
     * @Route("/citations", name="app_frontoffice_quotes_browse")
     */
    public function browse(QuoteRepository $quoteRepository): Response
    {
        $quotes = $quoteRepository->findAll();

        return $this->render('frontoffice/quote/index.html.twig', [
            "quotes" => $quotes,
        ]);
    }
}
