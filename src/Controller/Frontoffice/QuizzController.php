<?php

namespace App\Controller\Frontoffice;

use App\Entity\Quizz;
use App\Repository\QuizzRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizzController extends AbstractController
{
    
    /**
     * @Route("/quizz", name="app_frontoffice_quizz_browse")
     */
    public function browse(QuizzRepository $quizzRepository): Response
    {
        $quizzs = $quizzRepository->findAll();

        return $this->render('frontoffice/quizz/browse.html.twig', [
            'quizzs' => $quizzs,
        ]);
    }     
    
    /**
     * @Route("/quizz/{id}", name="app_frontoffice_quizz_read", methods={"GET"}, requirements={"id"="\d+"})
     * 
     */
    public function read($id, QuizzRepository $quizzRepository): Response
    {
        $quizz = $quizzRepository->find($id);
        
        return $this->render('frontoffice/quizz/read.html.twig', [
            'quizz' => $quizz,
        ]);
    }
    
}
