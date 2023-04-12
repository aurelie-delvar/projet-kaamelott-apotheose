<?php

namespace App\Controller\Backoffice;

use App\Repository\QuoteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
   

    // TODO : route search : doit afficher un résultat de recherche.
    /**
     * résultat de recherche
     *
     * @Route("/frontoffice/search",name="app_frontoffice_search", methods={"GET", "POST"})
     * 
     * @return Response
     */
    public function search( Request $request, QuoteRepository $quoteRepository, PaginatorInterface $paginator): Response
    {
        $words = $request->request->get("searchBack");

        $session = $this->get("session");

        if($words != null) {
            $session->set("words", $words);
        }

        $search = $words ?? $session->get("words"); 
        
       //$results= $quoteRepository->querySearchBack($words);
       // dump($results);
    
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
