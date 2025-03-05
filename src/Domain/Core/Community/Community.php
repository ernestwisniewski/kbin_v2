<?php

namespace Kbin\Domain\Core\Community;

use Symfony\Component\Uid\AbstractUid;

#[Aggregate]
class Community
{
    private function __construct(
        #[Identifier]
        private AbstractUid   $communityId,
        private CommunityName $communityName
    )
    {
    }

    public static function create(AbstractUid $communityId, CommunityName $communityName): self
    {
        return new self(
            $communityId,
            $communityName,
        );
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
