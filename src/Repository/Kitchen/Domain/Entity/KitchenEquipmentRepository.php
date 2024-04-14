<?php

namespace App\Repository\Kitchen\Domain\Entity;

use App\Kitchen\Domain\Entity\KitchenEquipment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<KitchenEquipment>
 *
 * @method KitchenEquipment|null find($id, $lockMode = null, $lockVersion = null)
 * @method KitchenEquipment|null findOneBy(array $criteria, array $orderBy = null)
 * @method KitchenEquipment[]    findAll()
 * @method KitchenEquipment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KitchenEquipmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KitchenEquipment::class);
    }

//    /**
//     * @return KitchenEquipment[] Returns an array of KitchenEquipment objects
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

//    public function findOneBySomeField($value): ?KitchenEquipment
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
