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
     * @Route("/", name="app_backoffice_episode_browse", methods={"GET"})
     */
    public function browse(EpisodeRepository $episodeRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $episodeRepository->episodePaginationQuery(),
            $request->query->get('page', 1),
            10
        );

        return $this->render('backoffice/episode/browse.html.twig', [
            'pagination' => $pagination
        ]);
    }

    /**
     * @Route("/add", name="app_backoffice_episode_add", methods={"GET", "POST"})
     */
    public function add(Request $request, EpisodeRepository $episodeRepository): Response
    {
        $episode = new Episode();
        $form = $this->createForm(EpisodeType::class, $episode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $episodeRepository->add($episode, true);

            return $this->redirectToRoute('app_backoffice_episode_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/episode/add.html.twig', [
            'episode' => $episode,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_episode_read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(Episode $episode): Response
    {
        return $this->render('backoffice/episode/read.html.twig', [
            'episode' => $episode,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_backoffice_episode_edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Episode $episode, EpisodeRepository $episodeRepository): Response
    {
        $form = $this->createForm(EpisodeType::class, $episode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $episodeRepository->add($episode, true);

            return $this->redirectToRoute('app_backoffice_episode_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/episode/edit.html.twig', [
            'episode' => $episode,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_episode_delete", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, Episode $episode, EpisodeRepository $episodeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$episode->getId(), $request->request->get('_token'))) {
            $episodeRepository->remove($episode, true);
        }

        return $this->redirectToRoute('app_backoffice_episode_browse', [], Response::HTTP_SEE_OTHER);
    }
}
