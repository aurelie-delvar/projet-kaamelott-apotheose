<?php

namespace App\Repository;

use App\Entity\Personage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Personage>
 *
 * @method Personage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Personage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Personage[]    findAll()
 * @method Personage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Personage::class);
    }

    public function add(Personage $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Personage $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
    * Trying to paginate with the paginator bundle which require a Doctrine query.
    * We want a query in order for the paginate method of the paginator
    * This is for the front & back offices.
    */
    public function paginationQuery()
    {
       return $this->createQueryBuilder('p')
           ->orderBy('p.creditOrder, p.name', 'ASC')
           ->getQuery()
       ;
    }


}
