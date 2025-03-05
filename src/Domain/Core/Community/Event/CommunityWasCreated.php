<?php

namespace Kbin\Domain\Core\Community\Event;

use Symfony\Component\Uid\AbstractUid;

final readonly class CommunityWasCreated
{
    public function __construct(
        public AbstractUid $communityId,
    ) {}
}
