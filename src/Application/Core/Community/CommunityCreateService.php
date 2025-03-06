<?php

namespace Kbin\Application\Core\Community;

use Ecotone\Modelling\Attribute\CommandHandler;
use Ecotone\Modelling\EventBus;
use Kbin\Domain\Core\Community\Command\CreateCommunity;
use Kbin\Domain\Core\Community\Community;
use Kbin\Domain\Core\Community\CommunityRepositoryInterface;
use Kbin\Domain\Core\Community\Event\CommunityWasCreated;

class CommunityCreateService
{
    public function __construct(private EventBus $eventBus, private CommunityRepositoryInterface $communityRepository)
    {
    }

    #[CommandHandler]
    public function create(CreateCommunity $command): Community
    {
        $community = Community::create(
            $command->getCommunityId(),
            $command->getCommunityName(),
        );

        $this->eventBus->publish(new CommunityWasCreated($command->getCommunityId()));

        return $community;
    }
}
