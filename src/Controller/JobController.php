<?php

namespace App\Controller;

use App\Entity\Job;
use App\Form\JobType;
use App\Form\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Util\ClassUtils;




class JobController extends AbstractController
{
    #[Route('/bi', name: 'app_job')]
    public function backindex(): Response
    {
        $view = $this->getDoctrine()->getRepository(Job::class)->findAll();
        return $this->render('job/backindex.html.twig', [
            'controller_name' => 'JobController',
            'v' => $view,
        ]);
    }

    #[Route('/job', name: 'app_job')]
    public function index(): Response
    {
        $view = $this->getDoctrine()->getRepository(Job::class)->findAll();
        return $this->render('job/index.html.twig', [
            'controller_name' => 'JobController',
            'v' => $view,
        ]);
    }

    #[Route('/addjob', name: 'addJob')]
    public function add(Request $request): Response
    {
        $job = new Job();

        $form = $this->createForm(JobType::class, $job);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($job);
            $em->flush();

            return $this->redirectToRoute('app_job');
        }
        return $this->render('job/createJob.html.twig', ['f'=>$form->createView()]);
    }

    #[Route('/deljob/{id}', name: 'del_job')]
    public function delete(job $job): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($job);
        $em->flush();

        return $this->redirectToRoute('app_job');
    }


    #[Route('/modjob/{id}', name: 'modifyJob')]
    public function modify(Request $request,$id): Response
    {
        $job = $this->getDoctrine()->getRepository(job::class)->find($id);
        
        $form = $this->createForm(JobType::class, $job);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('app_job');
        }
        return $this->render('job/updateJob.html.twig', ['f'=>$form->createView()]);
    }
}
