<?php

namespace Kbin\Infrastructure\Core\Community\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kbin\Infrastructure\Core\Community\Doctrine\Repository\CommunityRepository;
use Ramsey\Uuid\Uuid;
use Symfony\Bridge\Doctrine\Types\UuidType;

#[ORM\Entity(repositoryClass: CommunityRepository::class)]
class CommunityEntity
{
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    private Uuid $id;

    #[ORM\Column(length: 255)]
    private string $name;

    public function __construct(Uuid $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
