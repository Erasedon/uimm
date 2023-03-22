<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
     
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboardroute(RouterInterface $router): Response
    {
        $routes = $router->getRouteCollection();
    

        foreach ($routes as $route) {
            echo $route->getPath() . '<br>';
        }
        return $this->render('admin/dashboard.html.twig', [
            'controller_name' => 'AdminController',
            'routers' => $routes,
        ]);
    }
}
