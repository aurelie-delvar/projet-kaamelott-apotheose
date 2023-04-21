<?php

namespace App\Controller\Frontoffice;

use App\Entity\Personage;
use App\Repository\PersonageRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
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
    public function read(Personage $personage, PaginatorInterface $paginator, Request $request) : Response
    {
        $pagination = $paginator->paginate(
            $personage->getQuotes(), // we want all the quotes of the personage
            $request->query->get('page', 1), // 1 is the page by default
            5, // the limit of results by page
        );

        return $this->render('frontoffice/personage/read.html.twig', [
            'character' => $personage,
            'pagination' => $pagination,
        ]);
    }
}
