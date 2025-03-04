<?php

namespace Kbin\UI\Core\Community\Controller;

use Ecotone\Modelling\CommandBus;
use Kbin\Domain\Core\Community\Command\CreateCommunity;
use Kbin\Domain\Core\Community\CommunityName;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Uid\UuidV4;

final class CreateCommunityController extends AbstractController
{
    public function __construct(private CommandBus $commandBus)
    {

    }

    public function __invoke(): Response
    {
        $community = $this->commandBus->send(
            new CreateCommunity(
                new UuidV4(),
                new CommunityName('Music')
            )
        );

        dd($community);
    }
}
