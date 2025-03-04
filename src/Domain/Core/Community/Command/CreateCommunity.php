<?php

namespace Kbin\Domain\Core\Community\Command;

use Kbin\Domain\Core\Community\CommunityName;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Uid\AbstractUid;

class CreateCommunity
{
    public function __construct(
        public AbstractUid $communityId,
        public CommunityName $communityName,
    )
    {

    }
}
