<?php

namespace App\Controller\Backoffice;

use App\Entity\Question;
use App\Form\QuestionType;
use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/question")
 */
class QuestionController extends AbstractController
{
    /**
     * Display all questions
     * @Route("/", name="app_backoffice_question_browse", methods={"GET"})
     */
    public function browse(QuestionRepository $questionRepository): Response
    {
        return $this->render('backoffice/question/browse.html.twig', [
            'questions' => $questionRepository->findAll(),
        ]);
    }

    /**
     * Create a new question
     * @Route("/add", name="app_backoffice_question_add", methods={"GET", "POST"})
     */
    public function add(Request $request, QuestionRepository $questionRepository): Response
    {
        $question = new Question();
        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $questionRepository->add($question, true);

            return $this->redirectToRoute('app_backoffice_question_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/question/add.html.twig', [
            'question' => $question,
            'form' => $form,
        ]);
    }

    /**
     * show one question
     * @Route("/{id}", name="app_backoffice_question_read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(Question $question): Response
    {
        return $this->render('backoffice/question/read.html.twig', [
            'question' => $question,
        ]);
    }

    /**
     * update one question
     * @Route("/{id}/edit", name="app_backoffice_question_edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Question $question, QuestionRepository $questionRepository): Response
    {
        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $questionRepository->add($question, true);

            return $this->redirectToRoute('app_backoffice_question_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/question/edit.html.twig', [
            'question' => $question,
            'form' => $form,
        ]);
    }

    /**
     * Delete one question
     * @Route("/{id}", name="app_backoffice_question_delete", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, Question $question, QuestionRepository $questionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$question->getId(), $request->request->get('_token'))) {
            $questionRepository->remove($question, true);
        }

        return $this->redirectToRoute('app_backoffice_question_browse', [], Response::HTTP_SEE_OTHER);
    }
}
