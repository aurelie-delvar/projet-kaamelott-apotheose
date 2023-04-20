<?php

namespace App\Controller\Api;

use App\Entity\PlayQuizz;
use App\Repository\PlayQuizzRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class PlayQuizzController extends AbstractController
{
    /**
     * @Route("/api/play/quizz", name="app_api_play_quizz_browse", methods={"GET"})
     */
    public function browse(PlayQuizzRepository $playQuizzRepository): JsonResponse
    {
        $allScore = $playQuizzRepository->findAll();

        return $this->json(
            $allScore,
            Response::HTTP_OK,
            [],
            [
                "groups"=> 
                [
                    "playQuizz_browse"
                ]
            ]
        );  
    }

    /**
     * @Route("/api/play/quizz/{id}", name="app_api_play_quizz_read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read(PlayQuizz $playQuizz = null){
        if($playQuizz === null){
            return $this->json(
                [
                    "message" => "ce score n'existe pas"
                ],
                Response::HTTP_NOT_FOUND
            );
        }

        return $this->json(
            $playQuizz,
            Response::HTTP_FOUND,
            [],
            [
                "groups" =>
                [
                    "playQuizz_read"
                ]
            ]
        );
    }

    /**
     * 
     * @Route("/api/play/quizz/add", name="app_api_play_quizz_add", methods={"GET", "POST"})
     */

    public function add(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager, PlayQuizzRepository $playQuizzRepository, ValidatorInterface $validator ): JsonResponse
    {
                
        $jsonContent = $request->getContent();
        
        try {
            $scoreFromJson = $serializer->deserialize(
                $jsonContent,
                PlayQuizz::class,
                'json',
            );
        } catch (\Throwable $error){
            return $this->json(
                [
                    "message" => $error->getMessage()
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        } 
        
        $listError = $validator->validate($scoreFromJson);

        if (count($listError) > 0){
            return $this->json(
                $listError,
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $playQuizzRepository->add($scoreFromJson, true);
        
        return $this->json(
            $jsonContent,

            Response::HTTP_CREATED,

            [],

            [
                "groups" => 
                [
                    "playQuizz_read",
                    "playQuizz_browse"
                ]
            ]
        );
    }

}
