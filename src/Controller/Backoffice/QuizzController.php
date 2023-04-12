<?php

namespace App\Controller\Backoffice;

use App\Entity\Quizz;
use App\Form\QuizzType;
use App\Repository\QuizzRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/quizz")
 */
class QuizzController extends AbstractController
{
    /**
     * @Route("/", name="app_backoffice_quizz_browse", methods={"GET"})
     */
    public function browse(QuizzRepository $quizzRepository): Response
    {
        return $this->render('backoffice/quizz/browse.html.twig', [
            'quizz' => $quizzRepository->findAll(),
        ]);
    }

    /**
     * @Route("/add", name="app_backoffice_quizz_add", methods={"GET", "POST"})
     */
    public function add(Request $request, QuizzRepository $quizzRepository): Response
    {
        $quizz = new Quizz();
        $form = $this->createForm(QuizzType::class, $quizz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $quizzRepository->add($quizz, true);

            return $this->redirectToRoute('app_backoffice_quizz_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/quizz/add.html.twig', [
            'quizz' => $quizz,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_quizz_read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(Quizz $quizz): Response
    {
        return $this->render('backoffice/quizz/read.html.twig', [
            'quizz' => $quizz,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_backoffice_quizz_edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Quizz $quizz, QuizzRepository $quizzRepository): Response
    {
        $form = $this->createForm(QuizzType::class, $quizz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $quizzRepository->add($quizz, true);

            return $this->redirectToRoute('app_backoffice_quizz_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/quizz/edit.html.twig', [
            'quizz' => $quizz,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_quizz_delete", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, Quizz $quizz, QuizzRepository $quizzRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$quizz->getId(), $request->request->get('_token'))) {
            $quizzRepository->remove($quizz, true);
        }

        return $this->redirectToRoute('app_backoffice_quizz_browse', [], Response::HTTP_SEE_OTHER);
    }
}
