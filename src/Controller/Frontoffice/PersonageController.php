<?php

namespace App\Controller\Frontoffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonageController extends AbstractController
{
    /**
     * @Route("/personage", name="app_frontoffice_personage")
     */
    public function browse(): Response
    {
        return $this->render('frontoffice/personage/index.html.twig', [
            'controller_name' => 'PersonageController',
        ]);
    }
}
