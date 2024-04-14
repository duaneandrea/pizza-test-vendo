<?php

namespace App\Repository\Kitchen\Domain\Entity;

use App\Kitchen\Domain\Entity\PizzaInventory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PizzaInventory>
 *
 * @method PizzaInventory|null find($id, $lockMode = null, $lockVersion = null)
 * @method PizzaInventory|null findOneBy(array $criteria, array $orderBy = null)
 * @method PizzaInventory[]    findAll()
 * @method PizzaInventory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PizzaInventoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PizzaInventory::class);
    }

//    /**
//     * @return PizzaInventory[] Returns an array of PizzaInventory objects
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

//    public function findOneBySomeField($value): ?PizzaInventory
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
