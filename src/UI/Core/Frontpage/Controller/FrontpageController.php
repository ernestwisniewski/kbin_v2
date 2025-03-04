<?php

namespace Kbin\UI\Core\Frontpage\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FrontpageController extends AbstractController
{
    #[Route('/frontpage', name: 'app_frontpage')]
    public function __invoke(): Response
    {
        return $this->render('pages/frontpage.html.twig');
    }
}
