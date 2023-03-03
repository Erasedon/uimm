<?php

namespace App\Repository;

use App\Entity\Formation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Formation>
 *
 * @method Formation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Formation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Formation[]    findAll()
 * @method Formation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Formation::class);
    }

    public function save(Formation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Formation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function filterFormations($domaine, $niveau, $type)
    {
        $query = $this->createQueryBuilder('f');

        if ($domaine) {
            $query
                ->leftJoin('f.appartenir_domaine', 'd')
                ->andWhere('d.id = :id')
                ->setParameter('id', $domaine);
        }

        if ($niveau) {
            $query
                ->andWhere('f.niveau = :niveau')
                ->setParameter('niveau', $niveau);
        }

        if ($type) {
            $query
                ->leftJoin('f.effectuer_type_formation', 'tf')
                ->andWhere('tf.id = :id')
                ->setParameter('id', $type);
        }

        return $query->getQuery()->getResult();
    }

    // SELECT * FROM `formation` LEFT JOIN formation_domaine ON formation.id=formation_domaine.formation_id 
    // LEFT JOIN formation_type_formation ON formation.id=formation_type_formation.formation_id 
    // WHERE formation_domaine.domaine_id=2 AND formation_type_formation.type_formation_id=1;

    //    /**
    //     * @return Formation[] Returns an array of Formation objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('f.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Formation
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
