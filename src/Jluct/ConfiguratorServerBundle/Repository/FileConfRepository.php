<?php

namespace Jluct\ConfiguratorServerBundle\Repository;

/**
 * FileConfRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FileConfRepository extends \Doctrine\ORM\EntityRepository
{
    public function getFileAllData($id)
    {
        $query = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('f,b,s')
            ->from('JluctConfiguratorServerBundle:FileConf', 'f')
            ->leftJoin('f.blockConfig', 'b')
            ->leftJoin('b.stringConfig', 's')
            ->where('f.id=:id')
            ->setParameter('id', $id)
            ->getQuery();

        try {
            return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
