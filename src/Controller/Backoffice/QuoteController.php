<?php

namespace App\Controller\Backoffice;

use App\Entity\Quote;
use App\Form\QuoteType;
use App\Repository\QuoteRepository;
use Knp\Component\Pager\PaginatorInterface;
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
    public function browse(QuoteRepository $quoteRepository, Request $request, PaginatorInterface $paginator): Response
    {

        $paginationTrue = $paginator->paginate(
            $quoteRepository->paginationQueryBackTrue(), // here is our query from the repository
            $request->query->get('page', 1), // 1 is the page by default
            10, // the limit of results by page
        );

        return $this->render('backoffice/quote/browse.html.twig', [
            'validatedTrue' => $paginationTrue,
        ]);
    }

    /**
     * Here are the quotes submitted by an user, waiting to be moderated
     *
     * @Route("/quotes-to-validate", name="app_backoffice_quotes_to_validate", methods={"GET"})
     */
    public function browseToValidate(QuoteRepository $quoteRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $paginationFalse = $paginator->paginate(
            $quoteRepository->paginationQueryBackFalse(), // here is our query from the repository
            $request->query->get('page', 1), // 1 is the page by default
            10, // the limit of results by page
        );

        return $this->render('backoffice/quote/toValidate.html.twig', [
            'validatedFalse' => $paginationFalse,
        ]);
    }

    /**
     * Route for the button "set to validated"
     * 
     * @Route("/quote/{id}/validate", name="app_backoffice_quote_validate", requirements={"id" = "\d+"})
     */
    public function validate(QuoteRepository $quoteRepository, $id): Response
    {
        $quote = $quoteRepository->setValidationToTrue($id);

        return $this->redirectToRoute('app_backoffice_quote_browse');
    }

    /**
     * Route to reject a user's quote
     * 
     * @Route("/quote/{id}/reject", name="app_backoffice_quote_reject", requirements={"id" = "\d+"})
     */
    public function reject(Quote $quote, Request $request, QuoteRepository $quoteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$quote->getId(), $request->request->get('_token'))) {
            $quoteRepository->remove($quote, true);
        }

        return $this->redirectToRoute('app_backoffice_quote_browse', [], Response::HTTP_SEE_OTHER);
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
     * @Route("/{id}", name="app_backoffice_quote_read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(Quote $quote): Response
    {
        return $this->render('backoffice/quote/read.html.twig', [
            'quote' => $quote,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_backoffice_quote_edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
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
     * @Route("/{id}", name="app_backoffice_quote_delete", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, Quote $quote, QuoteRepository $quoteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$quote->getId(), $request->request->get('_token'))) {
            $quoteRepository->remove($quote, true);
        }

        return $this->redirectToRoute('app_backoffice_quote_browse', [], Response::HTTP_SEE_OTHER);
    }
}
