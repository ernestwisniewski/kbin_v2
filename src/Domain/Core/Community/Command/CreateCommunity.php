<?php

namespace Kbin\Domain\Core\Community\Command;

use Kbin\Domain\Core\Community\CommunityName;
use Symfony\Component\Uid\AbstractUid;

class CreateCommunity
{
    public function __construct(
        private readonly AbstractUid   $communityId,
        private readonly CommunityName $communityName,
    )
    {
    }

    public function getCommunityId(): AbstractUid
    {
        return $this->communityId;
    }

    public function getCommunityName(): CommunityName
    {
        return $this->communityName;
    }
}
