<?php

namespace App\Controller\Backoffice;

use App\Entity\Quote;
use App\Form\QuoteType;
use App\Repository\QuoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/quote")
 */
class QuoteController extends AbstractController
{
    /**
     * @Route("/", name="app_backoffice_quote_index", methods={"GET"})
     */
    public function index(QuoteRepository $quoteRepository): Response
    {
        return $this->render('backoffice/quote/index.html.twig', [
            'quotes' => $quoteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_backoffice_quote_new", methods={"GET", "POST"})
     */
    public function new(Request $request, QuoteRepository $quoteRepository): Response
    {
        $quote = new Quote();
        $form = $this->createForm(QuoteType::class, $quote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $quoteRepository->add($quote, true);

            return $this->redirectToRoute('app_backoffice_quote_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/quote/new.html.twig', [
            'quote' => $quote,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_quote_show", methods={"GET"})
     */
    public function show(Quote $quote): Response
    {
        return $this->render('backoffice/quote/show.html.twig', [
            'quote' => $quote,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_backoffice_quote_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Quote $quote, QuoteRepository $quoteRepository): Response
    {
        $form = $this->createForm(QuoteType::class, $quote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $quoteRepository->add($quote, true);

            return $this->redirectToRoute('app_backoffice_quote_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/quote/edit.html.twig', [
            'quote' => $quote,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_quote_delete", methods={"POST"})
     */
    public function delete(Request $request, Quote $quote, QuoteRepository $quoteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$quote->getId(), $request->request->get('_token'))) {
            $quoteRepository->remove($quote, true);
        }

        return $this->redirectToRoute('app_backoffice_quote_index', [], Response::HTTP_SEE_OTHER);
    }
}
