<?php

namespace Kbin\UI\Core\Frontpage\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

#[AsController]
final class FrontpageController
{
    public function __construct(private readonly Environment $twig)
    {

    }

    public function __invoke(): Response
    {
        return new Response(
            $this->twig->render('pages/frontpage.html.twig')
        );
    }
}
