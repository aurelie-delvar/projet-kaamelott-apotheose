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
        // $randomQuote = $quoteRepository->randomQuote();
        
        $randomId = rand(1,700);
        $quoteByRandId = $quoteRepository -> find($randomId);
        // dd ($quoteByRandId);


        // TODO j'affiche la liste des 10 dernières citations
        // j'ai besoin d'un repository : QuoteRepository
        // le findAll() ne me permet pas de trier les résultats
        // * $allQuotes = $quoteRepository->findAll();
        $last10Quotes = $quoteRepository->findBy(
            // je n'ai pas de critères, mais je dois fournir un tableau, celui ci sera vide
            [],
            ["id" => "DESC"], // tri par id decroissant
            $limit = 10, //j'en veux 10
            $offset = 0 // à partir de 0 (1er de la table)
            
        );
        // dd($last10Quotes);
        
        return $this->render('frontoffice/home/index.html.twig', [
           "randomQuote" => $quoteByRandId,
           "last10Quotes" => $last10Quotes
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
