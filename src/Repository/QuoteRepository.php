<?php

namespace App\Repository;

use App\Entity\Quote;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Quote>
 *
 * @method Quote|null find($id, $lockMode = null, $lockVersion = null)
 * @method Quote|null findOneBy(array $criteria, array $orderBy = null)
 * @method Quote[]    findAll()
 * @method Quote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Quote::class);
    }

    public function add(Quote $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Quote $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function randomQuote(): array
    {
        // version SQL
        $sql = "SELECT quote.text, quote.rating, personage.name , episode.title AS titleEpisode, season.title AS titleSeason
        FROM quote
        JOIN personage ON quote.personage_id = personage.id
        JOIN episode ON quote.episode_id = episode.id
        JOIN season ON episode.season_id = season.id
        ORDER BY RAND() 
        LIMIT 1";
        
        $doctrine = $this->getEntityManager()->getConnection();
        $statement = $doctrine->prepare($sql);
        $result = $statement->executeQuery();
        $quoteArray = $result->fetchAssociative();

        return $quoteArray;
    }


   /**
    * @return Quote[] Returns an array of Quote objects
    */
   public function paginationQuery()
   {
       return $this->createQueryBuilder('q')
           ->orderBy('q.id', 'ASC')
           ->getQuery()
       ;
   }

    /**
    * Query for the paginator. Quote list of the backoffice.
    */
    public function paginationQueryBack()
    {
        return $this->createQueryBuilder('q')
            ->orderBy('q.id', 'ASC')
            ->getQuery()
        ;
    }

    /**
    * Query for the paginator. Search results of the backoffice.
    */
    public function querySearchBack($words)
    {
       /*  $sql = "SELECT DISTINCT quote.text, personage.name, episode.title AS titleEpisode, season.title AS titleSeason
        FROM quote
        LEFT JOIN personage ON quote.personage_id = personage.id
        LEFT JOIN episode ON quote.episode_id = episode.id
        LEFT JOIN season ON episode.season_id = season.id
        WHERE quote.text LIKE '%$words%'
        OR personage.name LIKE '%$words%'
        OR episode.title LIKE '%$words%'
        OR season.title LIKE '%$words%'
        ORDER BY personage.name" ;

    
        
        $doctrine = $this->getEntityManager()->getConnection();
        $statement = $doctrine->prepare($sql);
        
        $result = $statement->executeQuery();
        $arrayQuote = $result->fetchAllAssociative();

        return $arrayQuote; */

        
        $queryBuilder =$this->createQueryBuilder('q');
        $queryBuilder
        ->select('DISTINCT q.text', 'p.name', 'e.title AS titleEpisode', 's.title AS titleSeason')
    
    ->leftJoin('q.personage', 'p')
    ->leftJoin('q.episode', 'e')
    ->leftJoin('e.season', 's')
    ->where(
        $queryBuilder->expr()->orX(
            $queryBuilder->expr()->like('q.text', ':words'),
            $queryBuilder->expr()->like('p.name', ':words'),
            $queryBuilder->expr()->like('e.title', ':words'),
            $queryBuilder->expr()->like('s.title', ':words')
        )
    )
    ->orderBy('p.name');
    $queryBuilder->setParameter('words', '%'.$words.'%');
        return  $queryBuilder->getQuery();
        
    }
 

//    public function findOneBySomeField($value): ?Quote
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
