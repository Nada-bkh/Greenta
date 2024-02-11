<?php

namespace App\Controller;

use App\Entity\Donation;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DonationController extends AbstractController
{
    #[Route('/donation', name: 'app_donation')]
    public function index(): Response
    {
        return $this->render('donation/index.html.twig', [
            'controller_name' => 'DonationController',
        ]);
    }
    #[Route('/addDonation', name: 'addDonation')]
    public function add_Donation(EntityManager $em, Request $req)
    {
    }
}
