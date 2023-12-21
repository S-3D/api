<?php

namespace App\Repository;

use App\Entity\DetailQuotidien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DetailQuotidien>
 *
 * @method DetailQuotidien|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetailQuotidien|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetailQuotidien[]    findAll()
 * @method DetailQuotidien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetailQuotidienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DetailQuotidien::class);
    }

//    /**
//     * @return DetailQuotidien[] Returns an array of DetailQuotidien objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DetailQuotidien
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
