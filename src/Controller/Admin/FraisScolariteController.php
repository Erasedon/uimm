<?php

namespace App\Controller\Admin;

use App\Entity\FraisScolarite;
use App\Form\FraisScolariteType;
use App\Repository\FraisScolariteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/frais/scolarite')]
class FraisScolariteController extends AbstractController
{
    #[Route('/', name: 'app_frais_scolarite_index', methods: ['GET'])]
    public function index(FraisScolariteRepository $fraisScolariteRepository): Response
    {
        return $this->render('frais_scolarite/index.html.twig', [
            'frais_scolarites' => $fraisScolariteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_frais_scolarite_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FraisScolariteRepository $fraisScolariteRepository): Response
    {
        $fraisScolarite = new FraisScolarite();
        $form = $this->createForm(FraisScolariteType::class, $fraisScolarite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fraisScolariteRepository->save($fraisScolarite, true);

            return $this->redirectToRoute('app_frais_scolarite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('frais_scolarite/new.html.twig', [
            'frais_scolarite' => $fraisScolarite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_frais_scolarite_show', methods: ['GET'])]
    public function show(FraisScolarite $fraisScolarite): Response
    {
        return $this->render('frais_scolarite/show.html.twig', [
            'frais_scolarite' => $fraisScolarite,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_frais_scolarite_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FraisScolarite $fraisScolarite, FraisScolariteRepository $fraisScolariteRepository): Response
    {
        $form = $this->createForm(FraisScolariteType::class, $fraisScolarite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fraisScolariteRepository->save($fraisScolarite, true);

            return $this->redirectToRoute('app_frais_scolarite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('frais_scolarite/edit.html.twig', [
            'frais_scolarite' => $fraisScolarite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_frais_scolarite_delete', methods: ['POST'])]
    public function delete(Request $request, FraisScolarite $fraisScolarite, FraisScolariteRepository $fraisScolariteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fraisScolarite->getId(), $request->request->get('_token'))) {
            $fraisScolariteRepository->remove($fraisScolarite, true);
        }

        return $this->redirectToRoute('app_frais_scolarite_index', [], Response::HTTP_SEE_OTHER);
    }
}
