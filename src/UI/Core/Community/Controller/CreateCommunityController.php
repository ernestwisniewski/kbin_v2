<?php

namespace Kbin\UI\Core\Community\Controller;

use Ecotone\Modelling\CommandBus;
use Kbin\Domain\Core\Community\Command\CreateCommunity;
use Kbin\Domain\Core\Community\CommunityName;
use Kbin\UI\Core\Community\DTO\CommunityDTO;
use Kbin\UI\Core\Community\Form\CommunityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Uid\UuidV4;
use Twig\Environment;

#[AsController]
final class CreateCommunityController
{
    public function __construct(
        private readonly CommandBus           $commandBus,
        private readonly Environment          $twig,
        private readonly FormFactoryInterface $form
    )
    {
    }

    public function __invoke(Request $request): Response
    {
        $form = $this->form->create(CommunityType::class, new CommunityDTO());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->commandBus->send(
                new CreateCommunity(
                    new UuidV4(),
                    new CommunityName('Music')
                )
            );

            return new RedirectResponse('/');
        }

        return new Response($this->twig->render('pages/community/create.html.twig', [
            'form' => $form->createView()
        ]));
    }
}
