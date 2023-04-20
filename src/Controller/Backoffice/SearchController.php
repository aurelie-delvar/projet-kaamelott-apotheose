<?php

namespace App\Controller\Backoffice;

use App\Repository\QuoteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SearchController extends AbstractController
{

    /**
     * search result
     *
     * @Route("/backoffice/search",name="app_backoffice_search", methods={"GET", "POST"})
     * 
     * @return Response
     */
    public function search( Request $request, QuoteRepository $quoteRepository, PaginatorInterface $paginator, SessionInterface $session): Response
    {
        $words = $request->request->get("searchBack");

        // $session = $this->get("session"); => deprecated, use sessionInterface instead

        if($words != null) {
            $session->set("words", $words);
        }

        $search = $words ?? $session->get("words"); 
        
       //$results= $quoteRepository->querySearchBack($words);
    
        //Paginate the results of the query
        $pagination = $paginator->paginate(
        // Doctrine Query, not results
        $quoteRepository->querySearch($search),
        // Define the page parameter
       $request->query->getInt('page', 1),
        // Items per page
       10
        );

        return $this->render('backoffice/search/index.html.twig', [
        //'results' => $results
            'pagination' => $pagination,
            'search' => $search

        ]);
   
    }
    
}
