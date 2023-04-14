<?php

namespace App\Controller\Backoffice;

use App\Entity\Avatar;
use App\Form\AvatarType;
use App\Repository\AvatarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/avatar")
 */
class AvatarController extends AbstractController
{
    /**
     * @Route("/", name="app_backoffice_avatar_browse", methods={"GET"})
     */
    public function browse(AvatarRepository $avatarRepository): Response
    {
        return $this->render('backoffice/avatar/browse.html.twig', [
            'avatars' => $avatarRepository->findAll(),
        ]);
    }

    /**
     * @Route("/add", name="app_backoffice_avatar_add", methods={"GET", "POST"})
     */
    public function add(Request $request, AvatarRepository $avatarRepository): Response
    {
        $avatar = new Avatar();
        $form = $this->createForm(AvatarType::class, $avatar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $avatarRepository->add($avatar, true);

            return $this->redirectToRoute('app_backoffice_avatar_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/avatar/add.html.twig', [
            'avatar' => $avatar,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_avatar_read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(Avatar $avatar): Response
    {
        return $this->render('backoffice/avatar/read.html.twig', [
            'avatar' => $avatar,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_backoffice_avatar_edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Avatar $avatar, AvatarRepository $avatarRepository): Response
    {
        $form = $this->createForm(AvatarType::class, $avatar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $avatarRepository->add($avatar, true);

            return $this->redirectToRoute('app_backoffice_avatar_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/avatar/edit.html.twig', [
            'avatar' => $avatar,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_avatar_delete", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, Avatar $avatar, AvatarRepository $avatarRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$avatar->getId(), $request->request->get('_token'))) {
            $avatarRepository->remove($avatar, true);
        }

        return $this->redirectToRoute('app_backoffice_avatar_browse', [], Response::HTTP_SEE_OTHER);
    }
}
