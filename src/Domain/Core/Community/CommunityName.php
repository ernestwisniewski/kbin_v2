<?php

namespace Kbin\Domain\Core\Community;

use Assert\Assert;
use Kbin\UI\Core\Community\DTO\CommunityDTO;

class CommunityName
{
    public function __construct(private readonly string $communityName)
    {
        $min = CommunityDTO::MIN_NAME_LENGTH;
        $max = CommunityDTO::MAX_NAME_LENGTH;

        Assert::that($communityName)
            ->notEmpty('CommunityEntity name cannot be empty.')
            ->minLength($min, sprintf('CommunityEntity name must be at least %s characters long.', $min))
            ->maxLength($max, sprintf('CommunityEntity name must be at most %s characters long.', $max));
    }

    public function __toString(): string
    {
        return $this->communityName;
    }
}
