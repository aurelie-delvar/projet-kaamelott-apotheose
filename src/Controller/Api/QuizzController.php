<?php

namespace App\Controller\Api;

use App\Entity\Quizz;
use App\Repository\QuizzRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizzController extends AbstractController
{
    /**
     * @Route("/api/quizz/{id}", name="app_api_quizz_read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read(Quizz $quizz = null){
        if($quizz === null){
            return $this->json(
                [
                    "message" => "ce quizz n'existe pas"
                ],
                Response::HTTP_NOT_FOUND
            );
        }

        return $this->json(
            $quizz,
            Response::HTTP_FOUND,
            [],
            [
                "groups" =>
                [
                    "quizz_read"
                ]
            ]
        );
    }

}
