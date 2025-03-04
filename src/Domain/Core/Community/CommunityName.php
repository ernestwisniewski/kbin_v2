<?php

namespace Kbin\Domain\Core\Community;

use Assert\Assert;

class CommunityName
{
    public function __construct(private string $communityName)
    {
        Assert::that($communityName)
            ->notEmpty('Community name cannot be empty.')
            ->minLength(3, 'Community name must be at least 3 characters long.');
    }

    public function __toString(): string
    {
        return $this->communityName;
    }
}
