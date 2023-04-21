<?php

namespace App\Controller\Frontoffice;

use App\Repository\QuoteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
   

    /**
     * result of search
     *
     * @Route("/frontoffice/recherche",name="app_frontoffice_search", methods={"GET", "POST"})
     * 
     * @return Response
     */
    public function search( Request $request, QuoteRepository $quoteRepository, PaginatorInterface $paginator, SessionInterface $session): Response
    {
        $words = $request->request->get("searchFront");
       
        // $session = $this->get("session"); => deprecated, use sessionInterface instead

        if($words != null) {
            $session->set("words", $words);
        }

        $search = $words ?? $session->get("words"); 
            
        //Paginate the results of the query
        $pagination = $paginator->paginate(
        // Doctrine Query, not results
        $quoteRepository->querySearch($search),
        // Define the page parameter
        $request->query->getInt('page', 1),
        // Items per page
        10
        );

    return $this->render('frontoffice/search/index.html.twig', [
        'pagination' => $pagination,
        'search' => $search
        
    ]);

        
    }
    

}
