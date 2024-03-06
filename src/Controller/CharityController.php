<?php

namespace App\Controller;


use App\Entity\Charity;
use App\Form\CharityType;
use App\Repository\CharityRepository;
use DateTime;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Expr\Cast\Double;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Psr\Log\LoggerInterface;

#[Route('/charity')]
class CharityController extends AbstractController

{
    #[Route('/all', name: 'app_charity_index', methods: ['GET'])]
    public function index(CharityRepository $charityRepository): Response
    {
        return $this->render('charity/index.html.twig', [
            'charities' => $charityRepository->findAll(),
        ]);
    }


    #[Route('/new', name: 'app_charity_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $charity = new Charity();
        $form = $this->createForm(CharityType::class, $charity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer le fichier téléchargé depuis le formulaire
            $file = $form->get('picture')->getData();

            //handle photos upload second fucntion 
            $file = $form->get('picture')->getData(); // Get the uploaded file from the form
            if ($file) {
                //Handle photos upload
                $filename = md5(uniqid()) . '.' . $file->guessExtension();


                $file->move($this->getParameter('uploads_directory'), $filename);
                $charity->setPicture($filename);
            }




            // Persistez et flushz l'entité charity
            $entityManager->persist($charity);
            $entityManager->flush();

            // Rediriger vers la page d'index des charity
            return $this->redirectToRoute('app_charity_index', [], Response::HTTP_SEE_OTHER);
        }

        // Afficher le formulaire
        return $this->renderForm('charity/new.html.twig', [
            'charity' => $charity,
            'form' => $form,
        ]);
    }

    /*   #[Route('/{id}', name: 'app_charity_show', methods: ['GET'])]
    public function show(Charity $charity): Response
    {
        return $this->render('charity/show.html.twig', [
            'charity' => $charity,
        ]);
    }*/


    #[Route('charity/{id}', name: 'app_charity_show', methods: ['GET'])]
    public function show(Request $request, EntityManagerInterface $entityManager, Charity $charities): Response
    {
        dump($charities);

        return $this->render('charity/showBack.html.twig', [
            'charity' => $charities,
        ]);
    }






    #[Route('/{id}/edit', name: 'app_charity_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Charity $charity, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CharityType::class, $charity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_charity_index', [], Response::HTTP_SEE_OTHER);
        }

        // Set the isEdit variable according to your logic
        $isEdit = true;

        return $this->render('charity/edit.html.twig', [
            'charity' => $charity,
            'form' => $form->createView(),
            'isEdit' => $isEdit, // Pass the isEdit variable to the template
        ]);
    }

    #[Route('/{id}', name: 'app_charity_delete', methods: ['POST'])]
    public function delete(Request $request, Charity $charity, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $charity->getId(), $request->request->get('_token'))) {
            $entityManager->remove($charity);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_charity_index', [], Response::HTTP_SEE_OTHER);
    }
    /* #[Route('search', name: 'app_charity_search', methods: ['GET'])]

    public function searchByName(Request $request, CharityRepository $charityRepository, LoggerInterface $logger): JsonResponse
    {
        // Retrieve the 'name_of_charity' parameter from the request query string
        $name = $request->query->get('name_of_charity');

        // Log the search query
        $logger->info('Search query received: ' . $name);

        // Search for charities by name using the CharityRepository
        $charities = $charityRepository->findBy(['name_of_charity' => $name]);

        // Log the number of charities found
        $logger->info('Number of charities found: ' . count($charities));

        // Initialize an array to hold the formatted results
        $results = [];

        // Loop through the retrieved charities and format the data
        foreach ($charities as $charity) {
            $results[] = [
                'id' => $charity->getId(),
                'name_of_charity' => $charity->getNameOfCharity(),
                'amount_donated' => $charity->getAmountDonated(),
                'picture' => $charity->getPicture(),
                'last_date' => $charity->getLastDate(),
            ];
        }

        // Return a JSON response with the formatted results
        return $this->json($results);
    }*/
    #[Route('/search', name: 'app_charity_search', methods: ['GET'])]
    public function search(Request $request, CharityRepository $repo): Response
    {
        // Get the search query from the request
        $query = $request->query->get('keyword');
        $results = [];

        if ($query !== null) {
            // Call the searchByName() method with the query
            $results = $repo->searchByName($query);
        }

        // Render the search results template
        return $this->render('charity/search_results.html.twig', [
            'query' => $query,
            'results' => $results,
        ]);
    }
}
