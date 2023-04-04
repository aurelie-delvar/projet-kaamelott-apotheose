<?php

namespace App\Controller\Frontoffice;

use App\Repository\PersonageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonageController extends AbstractController
{
    /**
     * @Route("/personages", name="app_frontoffice_personages_browse")
     */
    public function browse(PersonageRepository $personageRepository): Response
    {
        $characters = $personageRepository->findAll();

        return $this->render('frontoffice/personage/index.html.twig', [
            'characters' => $characters,
        ]);
    }

    /**
     * @Route("/personage/{id}", name="app_frontoffice_personage_read", requirements={"id" = "\d+"})
     *
     */
    public function read(PersonageRepository $personageRepository, $id) : Response
    {
        $character = $personageRepository->find($id);

        return $this->render('frontoffice/personage/read.html.twig', [
            'character' => $character,
        ]);
    }
}
