<?php

namespace App\Controller\Frontoffice;

use App\Repository\PersonageRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PersonageController extends AbstractController
{
    /**
     * @Route("/personnages", name="app_frontoffice_personages_browse")
     */
    public function browse(PersonageRepository $personageRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $personageRepository->paginationQuery(), // here is our query from the repository
            $request->query->get('page', 1), // 1 is the page by default
            8, // the limit of results by page
        );

        return $this->render('frontoffice/personage/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    /**
     * @Route("/personnage/{id}", name="app_frontoffice_personage_read", requirements={"id" = "\d+"})
     *
     */
    public function read(PersonageRepository $personageRepository, $id, Security $security) : Response
    {
        $character = $personageRepository->find($id);
        $user = $security->getUser();

        return $this->render('frontoffice/personage/read.html.twig', [
            'character' => $character,
            "user" => $user,
        ]);
    }
}
