<?php

namespace App\Controller\Backoffice;

use App\Entity\Personage;
use App\Form\PersonageType;
use App\Repository\PersonageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\FilterFormType;

/**
 * @Route("/backoffice")
 */
class PersonageController extends AbstractController
{
    /**
     * @Route("/personages", name="app_backoffice_personage_browse", methods={"GET"})
     */
    public function browse(PersonageRepository $personageRepository): Response
    {
        return $this->render('backoffice/personage/browse.html.twig', [
            'personages' => $personageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/personage/add", name="app_backoffice_personage_add", methods={"GET", "POST"})
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
     * @Route("/personage/{id}", name="app_backoffice_personage_read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(Personage $personage, $id, PersonageRepository $personageRepository): Response
    {

        $personage = $personageRepository->find($id);
        if ($personage === null){
            
            throw $this->createNotFoundException("le film n'existe pas");
        }
        return $this->render('backoffice/personage/read.html.twig', [
            'personage' => $personage,
        ]);
    }

    /**
     * @Route("/personage/{id}/edit", name="app_backoffice_personage_edit", methods={"GET", "POST"})
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
     * @Route("/personage/{id}", name="app_backoffice_personage_delete", methods={"POST"})
     */
    public function delete(Request $request, Personage $personage, PersonageRepository $personageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$personage->getId(), $request->request->get('_token'))) {
            $personageRepository->remove($personage, true);
        }

        return $this->redirectToRoute('app_backoffice_personage_browse', [], Response::HTTP_SEE_OTHER);
    }
}
