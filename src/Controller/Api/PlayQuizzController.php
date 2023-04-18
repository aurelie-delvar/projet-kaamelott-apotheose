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
     * @Route("/api/play/quizz", name="app_api_play_quizz", methods={"GET"})
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

    public function add(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager): JsonResponse
    {
        $jsonContent = $request->getContent();
        //dump($jsonContent);
        try {
            $serializer->deserialize(
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

        $entityManager->flush();

        return $this->json(
            null,
            Response::HTTP_NO_CONTENT
        );
    }

    /**
     * 
     * @Route("/api/play/quizz/{id}", name="app_api_play_quizz_edit", requirements={"id"="\d+"}, methods={"PUT", "PATCH"})
     */

     public function edit(int $id, PlayQuizzRepository $playQuizzRepository, Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager, ValidatorInterface $validator): JsonResponse
     {
        $playQuizz = $playQuizzRepository->find($id); 

        if (!$playQuizz) {
            return $this->json(
                [
                    "message" => "Score non trouvé"
                ],
                Response::HTTP_NOT_FOUND
            );
        }
        
        $jsonContent = $request->getContent();
        dump($jsonContent);
        try {
            $serializer->deserialize(
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

        $e = $validator->validate($playQuizz); 
        if (count($e) > 0) {
            
            return $this->json(
                $e,
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }  
        $entityManager->flush();
 
        return $this->json(
            null,
            Response::HTTP_NO_CONTENT
        );
     }
}
