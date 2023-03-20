<?php

namespace App\Controller;

use App\Repository\DomaineRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SliderController extends AbstractController
{
    #[Route('/slider', name: 'app_slider')]
    public function index(DomaineRepository $domaineRepository): Response
    {
        $domaine = $domaineRepository->findAll();

        return $this->render('slider/index.html.twig', [
            'controller_name' => 'SliderController',
            'domaines' => $domaine
        ]);
    }
    
}
