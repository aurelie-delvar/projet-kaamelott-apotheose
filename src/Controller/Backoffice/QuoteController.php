<?php

namespace App\Controller\Backoffice;

use App\Entity\Quote;
use App\Entity\User;
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
     * @Route("/", name="app_backoffice_quote_browse", methods={"GET"})
     */
    public function browse(QuoteRepository $quoteRepository): Response
    {
        return $this->render('backoffice/quote/browse.html.twig', [
            'quotes' => $quoteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/add", name="app_backoffice_quote_add", methods={"GET", "POST"})
     */
    public function add(Request $request, QuoteRepository $quoteRepository): Response
    {
        $quote = new Quote();
        $form = $this->createForm(QuoteType::class, $quote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $quoteRepository->add($quote, true);

            return $this->redirectToRoute('app_backoffice_quote_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/quote/add.html.twig', [
            'quote' => $quote,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_quote_read", methods={"GET"})
     */
    public function read(Quote $quote): Response
    {
        return $this->render('backoffice/quote/read.html.twig', [
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

            return $this->redirectToRoute('app_backoffice_quote_browse', [], Response::HTTP_SEE_OTHER);
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

        return $this->redirectToRoute('app_backoffice_quote_browse', [], Response::HTTP_SEE_OTHER);
    }
}
