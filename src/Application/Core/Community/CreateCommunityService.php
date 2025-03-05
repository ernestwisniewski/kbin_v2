<?php

namespace Kbin\Application\Core\Community;

use Ecotone\Modelling\Attribute\CommandHandler;
use Ecotone\Modelling\EventBus;
use Kbin\Domain\Core\Community\Command\CreateCommunity;
use Kbin\Domain\Core\Community\Community;
use Kbin\Domain\Core\Community\Event\CommunityWasCreated;

class CreateCommunityService
{
    #[CommandHandler]
    public static function create(CreateCommunity $command, EventBus $eventBus): Community
    {
        $community = Community::create(
            $command->getCommunityId(),
            $command->getCommunityName(),
        );

        $eventBus->publish(new CommunityWasCreated($command->getCommunityId()));

        return $community;
    }
}
