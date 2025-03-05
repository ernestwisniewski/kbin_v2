<?php

namespace Kbin\UI\Core\Community\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class CommunityDTO
{
    public const int MIN_NAME_LENGTH = 2;
    public const int MAX_NAME_LENGTH = 25;

    #[Assert\NotBlank]
    #[Assert\Length(min: self::MIN_NAME_LENGTH, max: self::MAX_NAME_LENGTH)]
    public string $name;
}
