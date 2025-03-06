<?php

namespace Kbin\Infrastructure\Core\Community;

use Kbin\Domain\Core\Community\Community;
use Kbin\Domain\Core\Community\CommunityName;
use Kbin\Infrastructure\Core\Community\Doctrine\CommunityEntity;

class CommunityFactory
{
    public function createAggregate(CommunityEntity $communityEntity): Community
    {
        return Community::create(
            $communityEntity->getId(),
            new CommunityName($communityEntity->getName())
        );
    }

    public function createEntity(object $community): CommunityEntity
    {
        return new CommunityEntity(
            $community->getCommunityId(),
            $community->getCommunityName()
        );
    }
}
