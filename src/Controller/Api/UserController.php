<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    
    /**
     * @Route("/api/user", name="app_api_user_browse")
     */
    public function browse(UserRepository $userRepository): JsonResponse
    {
        
        $allUser = $userRepository->findAll();

        return $this->json(
            $allUser,
            Response::HTTP_OK,
            [],
            [
                "groups"=> 
                [
                    "user_browse"
                ]
            ]
        );    
    }

    /**
     * @Route("/api/user/{id}", name="app_api_user_read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read(User $user = null){
        if($user === null){
            return $this->json(
                [
                    "message" => "cet utilisateur n'existe pas"
                ],
                Response::HTTP_NOT_FOUND
            );
        }

        return $this->json(
            $user,
            Response::HTTP_FOUND,
            [],
            [
                "groups" =>
                [
                    "user_read"
                ]
            ]
        );
    }
   
    
}
