<?php

namespace App\Repository;

use App\Entity\Quote;
use Doctrine\Persistence\ManagerRegistry;
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
        $sql = "SELECT quote.id, quote.text, quote.rating, personage.name, episode.title AS episode, season.title AS season
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
    * Paginate all the quotes
    */
    public function paginationQuery()
    {
       return $this->createQueryBuilder('q')
           ->orderBy('q.id', 'ASC')
           ->where('q.validated = true')
           ->getQuery()
       ;
    }

    /**
    * Query for the paginator. Quote list of the backoffice.
    */
    public function paginationQueryBackTrue()
    {
        return $this->createQueryBuilder('q')
            ->orderBy('q.id', 'ASC')
            ->where('q.validated = true')
            ->getQuery()
        ;
    }

    /**

    * Query for the paginator. Quote list of the backoffice.
    */
    public function paginationQueryBackFalse()
    {
        return $this->createQueryBuilder('q')
            ->orderBy('q.id', 'ASC')
            ->where('q.validated = false')
            ->getQuery()
        ;
    }

    
    /**
     * Query to validate a user's quote 
     */
    public function setValidationToTrue($id)
    {
        $query = $this->createQueryBuilder('App\Entity\Quote', 'q')
                    ->update('App\Entity\Quote','q')
                    ->set('q.validated', 1)
                    ->where('q.id  = :id')
                    ->setParameter('id', $id)
                    ->getQuery()
        ;

        return $result = $query->execute();
    }

    /**
    * Query for the paginator. Search results of the backoffice.
    */
    public function querySearch($words)
    {        
        $queryBuilder =$this->createQueryBuilder('q');
        $queryBuilder
            ->select('DISTINCT q.text', 'q.id', 'p.name', 'p.id AS idPersonage', 'e.title AS titleEpisode', 'e.id AS idEpisode', 's.id AS idSeason', 's.title AS titleSeason')
    
            ->leftJoin('q.personage', 'p')
            ->leftJoin('q.episode', 'e')
            ->leftJoin('e.season', 's')
            // expr is a doctrine function which allow to create request expressions, and orX is one of its method, corresponding to an "OR"
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
 
}
