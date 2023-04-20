<?php

namespace App\Controller\Backoffice;

use App\Entity\Actor;
use App\Form\ActorType;
use App\Repository\ActorRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/actor")
 */
class ActorController extends AbstractController
{
    /**
     * @Route("/", name="app_backoffice_actors_browse", methods={"GET"})
     */
    public function browse(ActorRepository $actorRepository, PaginatorInterface $paginator, Request $request): Response
    {

        $pagination = $paginator->paginate(
            $actorRepository->paginationQueryBack(), // here is our query from the repository
            $request->query->get('page', 1), // 1 is the page by default
            10, // the limit of results by page
        );


        return $this->render('backoffice/actor/browse.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    /**
     * @Route("/add", name="app_backoffice_actor_add", methods={"GET", "POST"})
     */
    public function add(Request $request, ActorRepository $actorRepository): Response
    {
        $actor = new Actor();
        $form = $this->createForm(ActorType::class, $actor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $actorRepository->add($actor, true);

            return $this->redirectToRoute('app_backoffice_actors_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/actor/add.html.twig', [
            'actor' => $actor,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_actor_read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(Actor $actor): Response
    {
        return $this->render('backoffice/actor/read.html.twig', [
            'actor' => $actor,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_backoffice_actor_edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Actor $actor, ActorRepository $actorRepository): Response
    {
        $form = $this->createForm(ActorType::class, $actor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $actorRepository->add($actor, true);

            return $this->redirectToRoute('app_backoffice_actors_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/actor/edit.html.twig', [
            'actor' => $actor,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_actor_delete", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, Actor $actor, ActorRepository $actorRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$actor->getId(), $request->request->get('_token'))) {
            $actorRepository->remove($actor, true);
        }

        return $this->redirectToRoute('app_backoffice_actors_browse', [], Response::HTTP_SEE_OTHER);
    }
}
