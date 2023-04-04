<?php

namespace App\Controller\Frontoffice;

use App\Repository\ActorRepository;
use App\Repository\QuoteRepository;
use App\Repository\PersonageRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
    public function legalNotice(): Response
    {
        return $this->render('frontoffice/home/legalNotice.html.twig');
    }

    /**
     * @Route("/iconographies", name="app_home_iconographyIndex")
     */
    public function iconographyIndex(PersonageRepository $personageRepository, ActorRepository $actorRepository): Response
    {
        $characters = $personageRepository->findAll();
        $actors = $actorRepository->findAll();
        return $this->render('frontoffice/home/iconographyIndex.html.twig', [
            'characters' => $characters,
            'actors' => $actors
        ]);
    }

}
