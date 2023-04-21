<?php

namespace App\Controller\Frontoffice;

use App\Entity\Quote;
use App\Form\AddQuoteType;
use App\Repository\ActorRepository;
use App\Repository\QuoteRepository;
use App\Repository\PersonageRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="default")
     * @Route("/accueil", name="app_home_index")
     */
    public function index(QuoteRepository $quoteRepository): Response
    {
        $randomQuote = $quoteRepository->randomQuote();

        $last10Quotes = $quoteRepository->findBy(
            ["validated" => 1],
            ["id" => "DESC"], 
            $limit = 10, 
            $offset = 0 
            
        );
        
        return $this->render('frontoffice/home/index.html.twig', [
           "randomQuote" => $randomQuote,
           "last10Quotes" => $last10Quotes,
        ]);
    }

    /**
     * @Route("/mentions-legales", name="app_home_legalNotice")
     */
    public function legalNotice(): Response
    {
        return $this->render('frontoffice/home/legalNotice.html.twig');
    }

    /**
     * @Route("/iconographies", name="app_home_iconographyIndex")
     */
    public function iconographyIndex(PersonageRepository $personageRepository, ActorRepository $actorRepository): Response
    {
        $characters = $personageRepository->findAll();
        $actors = $actorRepository->findAll();
        return $this->render('frontoffice/home/iconographyIndex.html.twig', [
            'characters' => $characters,
            'actors' => $actors
        ]);
    }

    /**
     * form for the user to ask for adding a quote
     *
     * @Route("/formulaire-ajout-citation", name="app_frontoffice_quote_add", methods={"GET", "POST"})
     * @IsGranted("ROLE_USER", message="Vous devez être connecté(e) pour accéder à ce formulaire")
     */
    public function formAddQuote(Request $request, QuoteRepository $quoteRepository, Security $user) : Response
    {
        $quote = new Quote();

        $quote->setUser($user->getUser());

        $form = $this->createForm(AddQuoteType::class, $quote);
        $form->handleRequest($request);

        // here, we switch to POST and we want the user to be redirected to the homepage
        if($form->isSubmitted() && $form->isValid()) {

            // if the form is ok, we flush to add in database
            $quoteRepository->add($quote, true);

            return $this->redirectToRoute('default', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('frontoffice/home/addQuote.html.twig', [
            'quote' => $quote,
            'form' => $form,
        ]);
    }
}
