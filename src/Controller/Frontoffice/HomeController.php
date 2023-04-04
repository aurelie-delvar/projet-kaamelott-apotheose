<?php

namespace App\Controller\Frontoffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="default")
     * @Route("/home", name="app_home_index")
     */
    public function index(): Response
    {
        return $this->render('frontoffice/home/index.html.twig', [
           
        ]);
    }

    /**
     * @Route("/mentions-legales", name="app_home_legalNotice")
     */
    public function mentionsLegales(): Response
    {
        return $this->render('frontoffice/home/legalNotice.html.twig', [
           
        ]);
    }


}
