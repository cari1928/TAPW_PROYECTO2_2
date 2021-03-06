<?php

namespace Proyecto2Bundle\Repository;

/**
 * ClienteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClienteRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAllClientsOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM Proyecto2Bundle:Cliente p ORDER BY p.idcliente DESC'
            )
            ->getResult();
    }
}
