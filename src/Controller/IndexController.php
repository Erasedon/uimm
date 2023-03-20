<?php

namespace App\Controller;

namespace App\Controller;

use App\Repository\DomaineRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(DomaineRepository $repository): Response
    {
        $domaines = $repository->findAll();
        
        return $this->render('pages/acceuil/index.html.twig', [
            'controller_name' => 'IndexController',
            'domaines' => $domaines,
        ]);
    }
    
}
