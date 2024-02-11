<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginBackController extends AbstractController
{
    #[Route('/back/login', name: 'app_login_back')]
    public function index(): Response
    {
        return $this->render('back/login.html.twig', [
            'controller_name' => 'LoginBackController',
        ]);
    }
}
