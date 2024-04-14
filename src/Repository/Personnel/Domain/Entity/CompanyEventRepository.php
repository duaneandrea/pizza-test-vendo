<?php

namespace App\Repository\Personnel\Domain\Entity;

use App\Personnel\Domain\Entity\CompanyEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CompanyEvent>
 *
 * @method CompanyEvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompanyEvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompanyEvent[]    findAll()
 * @method CompanyEvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyEventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompanyEvent::class);
    }

//    /**
//     * @return CompanyEvent[] Returns an array of CompanyEvent objects
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

//    public function findOneBySomeField($value): ?CompanyEvent
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
