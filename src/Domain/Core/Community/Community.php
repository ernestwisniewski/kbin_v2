<?php

namespace Kbin\Domain\Core\Community;

use App\Domain\Customer\Command\RegisterCustomer;
use Ecotone\Modelling\Attribute\CommandHandler;
use Kbin\Domain\Core\Community\Command\CreateCommunity;
use Symfony\Component\Uid\AbstractUid;

#[Aggregate]
class Community
{
    private function __construct(
        #[Identifier]
        private AbstractUid   $communityId,
        private CommunityName $name
    )
    {
    }

    #[CommandHandler]
    public static function register(CreateCommunity $command): self
    {
        return new self(
            $command->communityId,
            $command->communityName,
        );
    }
}
