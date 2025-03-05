<?php

namespace Kbin\Infrastructure\Core\Community\Doctrine\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Kbin\Infrastructure\Core\Community\Doctrine\Entity\CommunityEntity;

/**
 * @extends ServiceEntityRepository<CommunityEntity>
 */
class CommunityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommunityEntity::class);
    }

    public function save(CommunityEntity $community): void
    {
        $this->getEntityManager()->persist($community);
        $this->getEntityManager()->flush();
    }
}
