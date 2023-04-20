<?php

namespace App\Controller\Backoffice;

use App\Entity\Author;
use App\Form\AuthorType;
use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/author")
 */
class AuthorController extends AbstractController
{
    /**
     * @Route("/", name="app_backoffice_author_browse", methods={"GET"})
     */
    public function browse(AuthorRepository $authorRepository): Response
    {
        return $this->render('backoffice/author/browse.html.twig', [
            'authors' => $authorRepository->findAll(),
        ]);
    }

    /**
     * @Route("/add", name="app_backoffice_author_add", methods={"GET", "POST"})
     */
    public function add(Request $request, AuthorRepository $authorRepository): Response
    {
        $author = new Author();
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $authorRepository->add($author, true);

            return $this->redirectToRoute('app_backoffice_author_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/author/add.html.twig', [
            'author' => $author,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_author_read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(Author $author): Response
    {
        return $this->render('backoffice/author/read.html.twig', [
            'author' => $author,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_backoffice_author_edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Author $author, AuthorRepository $authorRepository): Response
    {
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $authorRepository->add($author, true);

            return $this->redirectToRoute('app_backoffice_author_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/author/edit.html.twig', [
            'author' => $author,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_author_delete", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, Author $author, AuthorRepository $authorRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$author->getId(), $request->request->get('_token'))) {
            $authorRepository->remove($author, true);
        }

        return $this->redirectToRoute('app_backoffice_author_browse', [], Response::HTTP_SEE_OTHER);
    }
}
