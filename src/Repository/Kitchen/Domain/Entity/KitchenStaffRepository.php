<?php

namespace App\Repository\Kitchen\Domain\Entity;

use App\Kitchen\Domain\Entity\KitchenStaff;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<KitchenStaff>
 *
 * @method KitchenStaff|null find($id, $lockMode = null, $lockVersion = null)
 * @method KitchenStaff|null findOneBy(array $criteria, array $orderBy = null)
 * @method KitchenStaff[]    findAll()
 * @method KitchenStaff[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KitchenStaffRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KitchenStaff::class);
    }

//    /**
//     * @return KitchenStaff[] Returns an array of KitchenStaff objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('k.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?KitchenStaff
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
