<?php

namespace App\Controller\Frontoffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizzController extends AbstractController
{
    /**
     * @Route("/quizz", name="app_frontoffice_quizz_index")
     */
    public function index(): Response
    {
        return $this->render('frontoffice/quizz/index.html.twig', [
            'controller_name' => 'quizzController',
        ]);
    }

   
}
