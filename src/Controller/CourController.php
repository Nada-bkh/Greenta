<?php

namespace App\Controller;

use App\Entity\Cour;
use App\Form\CourType;
use App\Form\CourEditType;
use App\Repository\CourRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\Form\FormError;

#[Route('/cour')]
class CourController extends AbstractController
{
    #[Route('/', name: 'app_cour_index', methods: ['GET'])]
    public function index(CourRepository $courRepository): Response
    {
        return $this->render('cour/index.html.twig', [
            'cours' => $courRepository->findAll(),
        ]);
    }
    #[Route('/cb', name: 'app_cour_index_back', methods: ['GET'])]
    public function indexBack(CourRepository $courRepository): Response
    {
        return $this->render('cour/indexBack.html.twig', [
            'cours' => $courRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_cour_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cour = new Cour();
        $form = $this->createForm(CourType::class, $cour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pdfFile = $form->get('pdfpath')->getData();

           
            if ($pdfFile instanceof UploadedFile) {
                
                $fileName = md5(uniqid()) . '.' . $pdfFile->guessExtension();
    
               
                try {
                    $targetDirectory = $this->getParameter('kernel.project_dir') . '/public';
                    $pdfFile->move(
                        $targetDirectory, 
                        $fileName
                    );
                } catch (FileException $e) {
                   
                }
    
                
                $cour->setPdfpath($fileName);
            }
            $date = new \DateTimeImmutable();
            $cour->setCreatedAt($date);
            $entityManager->persist($cour);
            $entityManager->flush();

            return $this->redirectToRoute('app_cour_index_back', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cour/new.html.twig', [
            'cour' => $cour,
            'form' => $form,
        ]);
    }
    #[Route('/pdf/{id}', name: 'pdf_show', methods: ['GET'])]
    public function PdfShow(Cour $cour): Response
    {
$pdfPath = $this->getParameter('kernel.project_dir') . '/public/'.$cour->getPdfpath();
    

if (!file_exists($pdfPath)) {
    throw $this->createNotFoundException('The PDF file does not exist');
}


$response = new BinaryFileResponse($pdfPath);
$response->headers->set('Content-Type', 'application/pdf');


return $response;
    }

    #[Route('/{id}', name: 'app_cour_show', methods: ['GET'])]
    public function show(Cour $cour): Response
    {
        return $this->render('cour/show.html.twig', [
            'cour' => $cour,
        ]);
    }
    

    #[Route('/{id}/edit', name: 'app_cour_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cour $cour, EntityManagerInterface $entityManager): Response
    {
        $date = $cour->getCreatedAt();
        $form = $this->createForm(CourType::class, $cour);
        $form->handleRequest($request);
       


        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('titre')->getData() === null) {
                // Add a custom error message for a blank title
                $form->get('titre')->addError(new FormError('Title cannot be blank.'));
            } else {
                $cour->setCreatedAt($date);
                $entityManager->flush();
               
            }

            return $this->redirectToRoute('app_cour_index_back', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cour/edit.html.twig', [
            'cour' => $cour,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cour_delete', methods: ['POST'])]
    public function delete(Request $request, Cour $cour, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cour->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cour);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_cour_index_back', [], Response::HTTP_SEE_OTHER);
    }
}
