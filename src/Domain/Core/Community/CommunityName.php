<?php

namespace Kbin\Domain\Core\Community;

use Assert\Assert;
use Kbin\UI\Core\Community\DTO\CommunityDTO;

class CommunityName
{
    public const int MIN_NAME_LENGTH = 2;
    public const int MAX_NAME_LENGTH = 25;

    public function __construct(private readonly string $communityName)
    {
        $min = self::MIN_NAME_LENGTH;
        $max = self::MAX_NAME_LENGTH;

        Assert::that($communityName)
            ->notEmpty('Community name cannot be empty.')
            ->minLength($min, sprintf('CommunityEntity name must be at least %s characters long.', $min))
            ->maxLength($max, sprintf('CommunityEntity name must be at most %s characters long.', $max));
    }

    public function __toString(): string
    {
        return $this->communityName;
    }
}
