<?php

namespace App\Controller\Frontoffice;

use App\Repository\QuoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="default")
     * @Route("/home", name="app_home_index")
     */
    public function index(QuoteRepository $quoteRepository): Response
    {
        $randomQuote = $quoteRepository->randomQuote();
        
        return $this->render('frontoffice/home/index.html.twig', [
           "randomQuote" => $randomQuote,
        ]);
    }

    /**
     * @Route("/mentions-legales", name="app_home_legalNotice")
     */
    public function mentionsLegales(): Response
    {
        return $this->render('frontoffice/home/legalNotice.html.twig');
    }

}
