<?php

namespace App\Repository;

use App\Entity\CatégorieActivite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CatégorieActivite>
 *
 * @method CatégorieActivite|null find($id, $lockMode = null, $lockVersion = null)
 * @method CatégorieActivite|null findOneBy(array $criteria, array $orderBy = null)
 * @method CatégorieActivite[]    findAll()
 * @method CatégorieActivite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CatégorieActiviteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CatégorieActivite::class);
    }

//    /**
//     * @return CatégorieActivite[] Returns an array of CatégorieActivite objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CatégorieActivite
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
