<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestapiController extends AbstractController
{
    #[Route('/testapi', name: 'app_testapi')]
    public function index(): Response
    {
        return $this->render('testapi/index.html.twig', [
            'controller_name' => 'TestapiController',
        ]);
    }
}
