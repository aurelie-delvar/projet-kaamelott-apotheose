<?php

namespace App\Controller\Api;

use App\Entity\Question;
use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    /**
     * @Route("/api/question", name="app_api_question_browse", methods={"GET"})
     */
    public function browse(QuestionRepository $questionRepository): JsonResponse
    {
        $allQuestion = $questionRepository->findAll();
        
        return $this->json(
            $allQuestion,
            Response::HTTP_OK,
            [],
            [
                "groups" => 
                [
                    "question_browse"
                ]
            ]
        );
    }

    /**
     * @Route("/api/question/{id}", name="app_api_question_read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read(Question $question = null){
        if($question === null){
            return $this->json(
                [
                    "message" => "cette question n'existe pas"
                ],
                Response::HTTP_NOT_FOUND
            );
        }

        return $this->json(
            $question,
            Response::HTTP_FOUND,
            [],
            [
                "groups" =>
                [
                    "question_read"
                ]
            ]
        );
    }
}
