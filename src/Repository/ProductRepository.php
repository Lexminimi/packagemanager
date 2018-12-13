<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function findProductID($ProductID): array
   {
       // automatically knows to select Products
       // the "p" is an alias you'll use in the rest of the query

       $conn = $this->getEntityManager()->getConnection();
       $sql = '
        SELECT * FROM product p
        WHERE p.product_id = :ProductID
        ';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['ProductID' => $ProductID]);

    // returns an array of arrays (i.e. a raw data set)
    return $stmt->fetchAll();

       // to get just one result:
       // $product = $qb->setMaxResults(1)->getOneOrNullResult();
   }

   public function findUserID($ProductID): array
  {
      
   // returns an array of arrays (i.e. a raw data set)
   return $stmt->fetchAll();

      // to get just one result:
      // $product = $qb->setMaxResults(1)->getOneOrNullResult();
  }
    // /**
    //  * @return Product[] Returns an array of Product objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.ProductID = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

}
