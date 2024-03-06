<?php

namespace App\Repository;

use App\Entity\Charity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMapping;


/**
 * @extends ServiceEntityRepository<Charity>
 */
class CharityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Charity::class);
    }

    // Commented out debug output in findAll method for production
    // public function findAll(): array
    // {
    //     $charities = parent::findAll();

    //     // Debug output
    //     // dump($charities);

    //     return $charities;
    // }

    /**
     * Search charities by name.
     *
     * @param string $keyword
     * @return Charity[]
     */

    public function searchByName(string $keyword): array
    {
        // Create a QueryBuilder instance
        $qb = $this->createQueryBuilder('c');

        // Add WHERE clause to filter charities by name
        $qb->andWhere('c.name_of_charity LIKE :keyword')
            ->setParameter('keyword', '%' . $keyword . '%');

        // Get the Query object
        $query = $qb->getQuery();

        // Log or print the DQL query
        $dql = $query->getDQL();
        dump($dql); // Output the DQL query to debug

        // Log or print the SQL query
        $sql = $query->getSQL();
        dump($sql); // Output the SQL query to debug

        // Execute the query and get results
        $charities = $query->getResult();

        // Handle case where no results are found
        if (empty($charities)) {
            // Handle the case here (e.g., return an empty array or log a message)
        }

        return $charities;
    }
}

    //    /**
    //     * @return Charity[] Returns an array of Charity objects
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

    //    public function findOneBySomeField($value): ?Charity
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
