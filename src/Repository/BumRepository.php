<?php

namespace App\Repository;

use App\Entity\Bum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Bum|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bum|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bum[]    findAll()
 * @method Bum[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BumRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bum::class);
    }

    // /**
    //  * @return Bum[] Returns an array of Bum objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bum
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
