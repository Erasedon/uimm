<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Validator\Constraints as Assert;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(Request $request): Response
    {

        $form = $this->createFormBuilder()
        ->add('nom', TextType::class, [
            'constraints' => [
                new Assert\NotBlank(),
                new Assert\Length(['min'=>  2, 'max' => 20, 'minMessage' => 'Votre nom doit faire au moins {{ limit }} caractères', 'maxMessage' => 'Votre nom doit faire au maximum {{ limit }} caractères'])
            ]
        ])
        ->add('email', EmailType::class,[
            'constraints' => [
                new Assert\NotBlank(),
                new Assert\Email(),
                new Assert\Length(['min'=>  2, 'max' => 180])
            ]
        ])
        ->add('message', TextType::class, [
            'constraints' => [
                new Assert\NotBlank(),
                new Assert\Length(['min'=>  5, 'max' => 20, 'minMessage' => 'Votre nom doit faire au moins {{ limit }} caractères', 'maxMessage' => 'Votre nom doit faire au maximum {{ limit }} caractères'])
            ]
        ])
        ->getForm();
        ;

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->addFlash('success', "Youpi");

            return $this->redirectToRoute('app_formation');
        }
        if ($form->isSubmitted() && !$form->isValid())
        {
            $content =  $this->renderView('test/index.html.twig', [
                'form' => $form->createView()
            ]);

            return new Response($content, 422);
        }

        return $this->render('test/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
