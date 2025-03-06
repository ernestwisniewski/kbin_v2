<?php

namespace Kbin\Infrastructure\Core\Community\Doctrine;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Kbin\Domain\Core\Community\Community;
use Kbin\Domain\Core\Community\CommunityRepositoryInterface;
use Kbin\Infrastructure\Core\Community\CommunityFactory;

readonly class CommunityRepository implements CommunityRepositoryInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private CommunityFactory       $communityFactory
    )
    {
    }

    public function canHandle(string $aggregateClassName): bool
    {
        return $aggregateClassName === Community::class;
    }

    public function findBy(string $aggregateClassName, array $identifiers): ?object
    {
        return $this->communityFactory->createAggregate(
            $this->entityManager->getRepository(CommunityEntity::class)->find($identifiers['communityId'])
        );
    }

    public function save(array $identifiers, object $aggregate, array $metadata, ?int $versionBeforeHandling): void
    {
        $entity = $this->communityFactory->createEntity($aggregate);

        $this->entityManager->persist($entity);
    }
}
