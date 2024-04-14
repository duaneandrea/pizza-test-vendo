<?php

namespace App\Repository\SalesAndPromotion\Domain\Entity;

use App\SalesAndPromotion\Domain\Entity\PizzaPrice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PizzaPrice>
 *
 * @method PizzaPrice|null find($id, $lockMode = null, $lockVersion = null)
 * @method PizzaPrice|null findOneBy(array $criteria, array $orderBy = null)
 * @method PizzaPrice[]    findAll()
 * @method PizzaPrice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PizzaPriceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PizzaPrice::class);
    }

//    /**
//     * @return PizzaPrice[] Returns an array of PizzaPrice objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PizzaPrice
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
