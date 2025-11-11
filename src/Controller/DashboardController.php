<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

final class DashboardController extends AbstractController
{

    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
        if($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_USER')){

            return $this->render('dashboard/index.html.twig');
        } 
         throw new AccessDeniedException('You do not have access to this page.');
    }
}