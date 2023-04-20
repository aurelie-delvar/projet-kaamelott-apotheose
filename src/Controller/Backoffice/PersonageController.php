<?php

namespace App\Controller\Backoffice;

use App\Entity\Personage;
use App\Form\PersonageType;
use App\Repository\PersonageRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\FilterFormType;

/**
 * @Route("/backoffice/personage")
 */
class PersonageController extends AbstractController
{
    /**
     * @Route("/", name="app_backoffice_personage_browse", methods={"GET"})
     */
    public function browse(PersonageRepository $personageRepository, Request $request, PaginatorInterface $paginator): Response
    {

        $pagination = $paginator->paginate(
            $personageRepository->paginationQuery(), // here is our query from the repository
            $request->query->get('page', 1), // 1 is the page by default
            10, // the limit of results by page
        );


        return $this->render('backoffice/personage/browse.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    /**
     * @Route("/add", name="app_backoffice_personage_add", methods={"GET", "POST"})
     */
    public function add(Request $request, PersonageRepository $personageRepository): Response
    {
        $personage = new Personage();
        $form = $this->createForm(PersonageType::class, $personage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $personageRepository->add($personage, true);

            return $this->redirectToRoute('app_backoffice_personage_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/personage/add.html.twig', [
            'personage' => $personage,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_personage_read", methods={"GET"}, requirements={"id"="\d+"})
     * @return Response
     */
    public function read(Personage $personage): Response
    {

        return $this->render('backoffice/personage/read.html.twig', [
            'personage' => $personage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_backoffice_personage_edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Personage $personage, PersonageRepository $personageRepository): Response
    {
        $form = $this->createForm(PersonageType::class, $personage);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $personageRepository->add($personage, true);

            return $this->redirectToRoute('app_backoffice_personage_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/personage/edit.html.twig', [
            'personage' => $personage,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_personage_delete", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, Personage $personage, PersonageRepository $personageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$personage->getId(), $request->request->get('_token'))) {
            $personageRepository->remove($personage, true);
        }

        return $this->redirectToRoute('app_backoffice_personage_browse', [], Response::HTTP_SEE_OTHER);
    }
}
