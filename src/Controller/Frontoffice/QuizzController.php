<?php

namespace App\Controller\Frontoffice;

use App\Repository\QuizzRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizzController extends AbstractController
{  
    /**
     * @Route("/quizz/{id}", name="app_frontoffice_quizz_read", methods={"GET"}, requirements={"id"="\d+"})
     * 
     */
    public function read($id, QuizzRepository $quizzRepository): Response
    {
        $quizz = $quizzRepository->find($id);

        if (!$this->isGranted("QUIZZ", $quizz))
        {
            return $this->redirectToRoute('app_login');
        }
        
        return $this->render('frontoffice/quizz/read.html.twig', [
            'quizz' => $quizz,
        ]);
    }  
}
