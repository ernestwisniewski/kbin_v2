<?php

namespace Kbin\UI\Core\Community\DTO;

use Kbin\Domain\Core\Community\CommunityName;
use Symfony\Component\Validator\Constraints as Assert;

class CommunityDTO
{
    #[Assert\NotBlank]
    #[Assert\Length(min: CommunityName::MIN_NAME_LENGTH, max: CommunityName::MAX_NAME_LENGTH)]
    public string $name;
}
