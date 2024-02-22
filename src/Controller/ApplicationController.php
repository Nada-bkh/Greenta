<?php

namespace App\Controller;

use App\Entity\Application;
use App\Form\ApplicationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ApplicationController extends AbstractController
{
    #[Route('/application', name: 'addApp')]
    public function add(Request $request): Response
{
    $app = new Application();

    $form = $this->createForm(ApplicationType::class, $app);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        $em = $this->getDoctrine()->getManager();
        $em->persist($app);
        $em->flush();

        $this->addFlash('success', 'Application added successfully');

        return $this->redirectToRoute('application');
    }

    return $this->render('application/index.html.twig', ['form' => $form->createView()]);
}
}