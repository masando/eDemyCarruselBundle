<?php

namespace eDemy\CarruselBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CarruselRepository extends EntityRepository
{
    public function findFirstPublished($namespace = null)
    {
        $qb = $this->createQueryBuilder('c');
        //$qb->andWhere('c.namespace = :namespace');
        $qb->andWhere('c.published = true');
        $qb->orderBy('c.id', 'ASC');
        //$qb->setParameter('namespace', $namespace);
        $qb->setMaxResults(1);
        $query = $qb->getQuery();
//die(var_dump($query->getResult()));
        return $query->getResult();
    }
}
