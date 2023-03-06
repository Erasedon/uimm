<?php

namespace App\Controller\Admin;

use App\Entity\CodeFormation;
use App\Form\CodeFormationType;
use App\Repository\CodeFormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/code/formation')]
class CodeFormationController extends AbstractController
{
    #[Route('/', name: 'app_code_formation_index', methods: ['GET'])]
    public function index(CodeFormationRepository $codeFormationRepository): Response
    {
        return $this->render('admin/code_formation/index.html.twig', [
            'code_formations' => $codeFormationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_code_formation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CodeFormationRepository $codeFormationRepository): Response
    {
        $codeFormation = new CodeFormation();
        $form = $this->createForm(CodeFormationType::class, $codeFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $codeFormationRepository->save($codeFormation, true);

            return $this->redirectToRoute('app_code_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/code_formation/new.html.twig', [
            'code_formation' => $codeFormation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_code_formation_show', methods: ['GET'])]
    public function show(CodeFormation $codeFormation): Response
    {
        return $this->render('admin/code_formation/show.html.twig', [
            'code_formation' => $codeFormation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_code_formation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CodeFormation $codeFormation, CodeFormationRepository $codeFormationRepository): Response
    {
        $form = $this->createForm(CodeFormationType::class, $codeFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $codeFormationRepository->save($codeFormation, true);

            return $this->redirectToRoute('app_code_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/code_formation/edit.html.twig', [
            'code_formation' => $codeFormation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_code_formation_delete', methods: ['POST'])]
    public function delete(Request $request, CodeFormation $codeFormation, CodeFormationRepository $codeFormationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$codeFormation->getId(), $request->request->get('_token'))) {
            $codeFormationRepository->remove($codeFormation, true);
        }

        return $this->redirectToRoute('app_code_formation_index', [], Response::HTTP_SEE_OTHER);
    }
}
