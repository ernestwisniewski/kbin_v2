<?php

namespace Kbin\UI\Core\Board;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FrontpageController extends AbstractController
{
    #[Route('/frontpage', name: 'app_frontpage')]
    public function index(): Response
    {
        return $this->render('frontpage/index.html.twig', [
            'controller_name' => 'FrontpageController',
        ]);
    }
}
