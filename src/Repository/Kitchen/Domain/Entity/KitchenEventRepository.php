<?php

namespace App\Repository\Kitchen\Domain\Entity;

use App\Kitchen\Domain\Entity\KitchenEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<KitchenEvent>
 *
 * @method KitchenEvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method KitchenEvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method KitchenEvent[]    findAll()
 * @method KitchenEvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KitchenEventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KitchenEvent::class);
    }

//    /**
//     * @return KitchenEvent[] Returns an array of KitchenEvent objects
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

//    public function findOneBySomeField($value): ?KitchenEvent
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
