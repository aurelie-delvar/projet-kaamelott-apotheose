<?php

namespace App\Controller\Backoffice;

use App\Entity\Episode;
use App\Form\EpisodeType;
use App\Repository\EpisodeRepository;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/backoffice/episode")
 */
class EpisodeController extends AbstractController
{
    /**
     * @Route("/episodes", name="app_backoffice_episode_browse", methods={"GET"})
     */
    public function index(EpisodeRepository $episodeRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $episodeRepository->paginationQuery(),
            $request->query->get('page', 1),
            10
        );

        return $this->render('backoffice/episode/index.html.twig', [
            'pagination' => $pagination
        ]);
    }

    /**
     * @Route("/new", name="app_backoffice_episode_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EpisodeRepository $episodeRepository): Response
    {
        $episode = new Episode();
        $form = $this->createForm(EpisodeType::class, $episode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $episodeRepository->add($episode, true);

            return $this->redirectToRoute('app_backoffice_episode_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/episode/new.html.twig', [
            'episode' => $episode,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_episode_show", methods={"GET"})
     */
    public function show(Episode $episode): Response
    {
        return $this->render('backoffice/episode/show.html.twig', [
            'episode' => $episode,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_backoffice_episode_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Episode $episode, EpisodeRepository $episodeRepository): Response
    {
        $form = $this->createForm(EpisodeType::class, $episode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $episodeRepository->add($episode, true);

            return $this->redirectToRoute('app_backoffice_episode_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/episode/edit.html.twig', [
            'episode' => $episode,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_episode_delete", methods={"POST"})
     */
    public function delete(Request $request, Episode $episode, EpisodeRepository $episodeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$episode->getId(), $request->request->get('_token'))) {
            $episodeRepository->remove($episode, true);
        }

        return $this->redirectToRoute('app_backoffice_episode_index', [], Response::HTTP_SEE_OTHER);
    }
}
