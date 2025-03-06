<?php

namespace Kbin\Infrastructure\Core\Community\Doctrine;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\AbstractUid;

#[ORM\Entity(repositoryClass: CommunityRepository::class)]
class CommunityEntity
{
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\Id]
    private AbstractUid $id;

    #[ORM\Column(length: 255)]
    private string $name;

    public function __construct(AbstractUid $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): AbstractUid
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
