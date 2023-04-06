<?php

namespace App\Controller\Frontoffice;

use App\Repository\SeasonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeasonController extends AbstractController
{
    // potentiellement ne sert à rien
    // /**
    //  * @Route("/season", name="app_frontoffice_seasons_browse")
    //  */
    // public function browse(): Response
    // {
    //     return $this->render('frontoffice/season/index.html.twig', [
    //         'controller_name' => 'SeasonController',
    //     ]);
    // }

    /**
     * @Route("/livre/{id}", name="app_frontoffice_season_read", requirements={"id":"\d+"})
     */
    public function read($id, SeasonRepository $seasonRepository): Response 
    {
        $season = $seasonRepository->find($id);

        return $this->render('frontoffice/season/read.html.twig', [
            'season' => $season,
        ]);
    }
}
