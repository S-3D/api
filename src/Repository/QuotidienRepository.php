<?php

namespace App\Repository;

use App\Entity\Quotidien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Quotidien>
 *
 * @method Quotidien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Quotidien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Quotidien[]    findAll()
 * @method Quotidien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuotidienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Quotidien::class);
    }

//    /**
//     * @return Quotidien[] Returns an array of Quotidien objects
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

//    public function findOneBySomeField($value): ?Quotidien
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
