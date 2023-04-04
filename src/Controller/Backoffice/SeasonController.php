<?php

namespace App\Controller\Backoffice;

use App\Entity\Season;
use App\Repository\SeasonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/season")
 */


class SeasonController extends AbstractController
{
    /**
     * Display all seasons
     * @Route("/", name="app_backoffice_season_browse", methods={"GET"})
     */
    public function browse(SeasonRepository $seasonRepository): Response
    {
        return $this->render('backoffice/season/browse.html.twig', [
            'seasons' => $seasonRepository->findAll(),
        ]);
    }

    /**
     * show one season
     * @Route("/{id}", name="app_backoffice_season_read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(Season $season): Response
    {
        return $this->render('backoffice/season/read.html.twig', [
            'season' => $season,
        ]);
    }
}
