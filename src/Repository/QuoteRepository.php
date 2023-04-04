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
        $sql = "SELECT * from quote
        ORDER BY RAND() 
        LIMIT 1";
        
        $doctrine = $this->getEntityManager()->getConnection();
        $statement = $doctrine->prepare($sql);
        $result = $statement->executeQuery();
        $quoteArray = $result->fetchAssociative();

        return $quoteArray;
    }

    /**
     * A try to paginate the quote's page as it's far too long for now.
     *
     * @param int $page the page you're on.
     * @param int $limit the number of quotes you want on one page. If nothing is indicated, it will be 10.
     * 
     * @return array
     */
    public function findQuotesPaginated(int $page, int $limit = 10): array
    {
        // with abs, limit is always positive (absolute)
        $limit = abs($limit);

        // initialisation of the results
        $result = [];

        $query = $this->getEntityManager()->createQueryBuilder()
            ->select('q') // "q" stands for "quotes"
            ->from('App\Entity\Quote', 'q')
            ->setMaxResults($limit) // we want 10 results by page
            ->setFirstResult(($page * $limit) - $limit); // the first result in the current page

        // we tell Doctrine we need to pagine with Paginator, and we pass our query
        $paginator = new Paginator($query);
        $data = $paginator->getQuery()->getResult();

        // we check if we really have datas
        if(empty($data)) {
            return $result; 
        }

        // we need to know the number of pages we generate, ceil round up the result
        $pages = ceil($paginator->count() / $limit);

        // we fill the array
        $result['data'] = $data;
        $result['pages'] = $pages;
        $result['page'] = $page;
        $result['limit'] = $limit;

        // don't forget we return an array!
        return $result;
    }

//    /**
//     * @return Quote[] Returns an array of Quote objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('q.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

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
