<?php

namespace App\Controller\Backoffice;

use App\Entity\Season;
use App\Form\SeasonType;
use App\Repository\SeasonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/season")
 */


class SeasonController extends AbstractController
{
    /**
     * Display all seasons
     * @Route("/", name="app_backoffice_season_browse", methods={"GET"})
     */
    public function browse(SeasonRepository $seasonRepository): Response
    {
        return $this->render('backoffice/season/browse.html.twig', [
            'seasons' => $seasonRepository->findAll(),
        ]);
    }

    /**
     * show one season
     * @Route("/{id}", name="app_backoffice_season_read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(Season $season): Response
    {
        return $this->render('backoffice/season/read.html.twig', [
            'season' => $season,
        ]);
    }

    /**
     * update season
     * @Route("/{id}/edit", name="app_backoffice_season_edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Season $season, SeasonRepository $seasonRepository): Response
    {
        $form = $this->createForm(SeasonType::class, $season);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $seasonRepository->add($season, true);

            return $this->redirectToRoute('app_backoffice_season_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/season/edit.html.twig', [
            'season' => $season,
            'form' => $form,
        ]);
    }

    /**
     * Create a new season
     * @Route("/add", name="app_backoffice_season_add", methods={"GET", "POST"})
     */
    public function add(Request $request, SeasonRepository $seasonRepository): Response
    {
        $season = new Season();
        $form = $this->createForm(SeasonType::class, $season);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $seasonRepository->add($season, true);

            return $this->redirectToRoute('app_backoffice_season_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/season/add.html.twig', [
            'season' => $season,
            'form' => $form,
        ]);
    }

    /**
     * Delete one season
     * @Route("/{id}", name="app_backoffice_season_delete", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, Season $season, SeasonRepository $seasonRepository): Response
    {
       
        if ($this->isCsrfTokenValid('delete'.$season->getId(), $request->request->get('_token'))) {
            $seasonRepository->remove($season, true);
        }

        return $this->redirectToRoute('app_backoffice_season_browse', [], Response::HTTP_SEE_OTHER);
    }
}
