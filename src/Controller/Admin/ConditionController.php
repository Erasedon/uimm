<?php

namespace App\Controller\Admin;

use App\Entity\Condition;
use App\Form\ConditionType;
use App\Repository\ConditionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/condition')]
class ConditionController extends AbstractController
{
    #[Route('/', name: 'app_condition_index', methods: ['GET'])]
    public function index(ConditionRepository $conditionRepository): Response
    {
        return $this->render('condition/index.html.twig', [
            'conditions' => $conditionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_condition_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ConditionRepository $conditionRepository): Response
    {
        $condition = new Condition();
        $form = $this->createForm(ConditionType::class, $condition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $conditionRepository->save($condition, true);

            return $this->redirectToRoute('app_condition_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('condition/new.html.twig', [
            'condition' => $condition,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_condition_show', methods: ['GET'])]
    public function show(Condition $condition): Response
    {
        return $this->render('condition/show.html.twig', [
            'condition' => $condition,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_condition_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Condition $condition, ConditionRepository $conditionRepository): Response
    {
        $form = $this->createForm(ConditionType::class, $condition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $conditionRepository->save($condition, true);

            return $this->redirectToRoute('app_condition_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('condition/edit.html.twig', [
            'condition' => $condition,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_condition_delete', methods: ['POST'])]
    public function delete(Request $request, Condition $condition, ConditionRepository $conditionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$condition->getId(), $request->request->get('_token'))) {
            $conditionRepository->remove($condition, true);
        }

        return $this->redirectToRoute('app_condition_index', [], Response::HTTP_SEE_OTHER);
    }
}
