<?php

namespace Kbin\Domain\Core\Community\Command;

use Kbin\Domain\Core\Community\CommunityName;
use Symfony\Component\Uid\AbstractUid;
use Symfony\Component\Uid\UuidV4;

class CreateCommunity
{
    private AbstractUid $communityId;

    public function __construct(
        private CommunityName $communityName,
    )
    {
        $this->communityId = new UuidV4();
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
