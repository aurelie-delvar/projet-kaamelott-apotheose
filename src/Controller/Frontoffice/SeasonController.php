<?php

namespace App\Controller\Frontoffice;

use App\Repository\SeasonRepository;
use App\Repository\EpisodeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SeasonController extends AbstractController
{
    /**
     * @Route("/livre/{id}", name="app_frontoffice_season_read", requirements={"id":"\d+"})
     */
    public function read($id, SeasonRepository $seasonRepository, EpisodeRepository $episodeRepository): Response 
    {
        $season = $seasonRepository->find($id);
        $episodes = $episodeRepository->findAll();

        return $this->render('frontoffice/season/read.html.twig', [
            'season' => $season,
            'episodes' => $episodes,
        ]);
    }
}
