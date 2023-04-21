<?php

namespace App\Repository;

use App\Entity\PlayQuizz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlayQuizz>
 *
 * @method PlayQuizz|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlayQuizz|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlayQuizz[]    findAll()
 * @method PlayQuizz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayQuizzRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlayQuizz::class);
    }

    public function add(PlayQuizz $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PlayQuizz $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function displayScore($id)
    {
        
        $sql= "SELECT pq.*
        FROM play_quizz pq
        JOIN (
            SELECT quizz_id, MAX(id) AS last_play_id
            FROM play_quizz
            WHERE user_id = $id
            GROUP BY quizz_id
        ) last_play ON pq.quizz_id = last_play.quizz_id AND pq.id = last_play.last_play_id";
        
        $doctrine = $this->getEntityManager()->getConnection();
        $statement = $doctrine->prepare($sql);
        $result = $statement->executeQuery();
        $scoreArray = $result->fetchAllAssociative();
        return $scoreArray;
    }


}
