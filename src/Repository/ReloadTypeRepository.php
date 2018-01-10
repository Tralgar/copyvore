<?php

namespace App\Repository;

use App\Entity\ReloadType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ReloadTypeRepository extends ServiceEntityRepository
{
  public function __construct(RegistryInterface $registry)
  {
    parent::__construct($registry, ReloadType::class);
  }

  public static function findActivated(EntityRepository $er)
  {
    return $er->getEntityManager()->createQueryBuilder('r')
              ->select('r')
              ->from('App\Entity\ReloadType', 'r')
              ->where('r.isAvailable = 1')
              ->orderBy('r.id', 'DESC');
  }
}
