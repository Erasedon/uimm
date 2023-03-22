<?php

namespace App\Controller\Admin;

use App\Entity\MetierVise;
use App\Form\MetierViseType;
use App\Repository\MetierViseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/metier/vise')]
class MetierViseController extends AbstractController
{
    #[Route('/', name: 'app_admin_metier_vise_index', methods: ['GET'])]
    public function index(MetierViseRepository $metierViseRepository): Response
    {
        return $this->render('admin/metier_vise/index.html.twig', [
            'metier_vises' => $metierViseRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_metier_vise_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MetierViseRepository $metierViseRepository): Response
    {
        $metierVise = new MetierVise();
        $form = $this->createForm(MetierViseType::class, $metierVise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $metierViseRepository->save($metierVise, true);

            return $this->redirectToRoute('app_metier_vise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/metier_vise/new.html.twig', [
            'metier_vise' => $metierVise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_metier_vise_show', methods: ['GET'])]
    public function show(MetierVise $metierVise): Response
    {
        return $this->render('admin/metier_vise/show.html.twig', [
            'metier_vise' => $metierVise,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_metier_vise_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MetierVise $metierVise, MetierViseRepository $metierViseRepository): Response
    {
        $form = $this->createForm(MetierViseType::class, $metierVise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $metierViseRepository->save($metierVise, true);

            return $this->redirectToRoute('app_metier_vise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/metier_vise/edit.html.twig', [
            'metier_vise' => $metierVise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_metier_vise_delete', methods: ['POST'])]
    public function delete(Request $request, MetierVise $metierVise, MetierViseRepository $metierViseRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$metierVise->getId(), $request->request->get('_token'))) {
            $metierViseRepository->remove($metierVise, true);
        }

        return $this->redirectToRoute('app_metier_vise_index', [], Response::HTTP_SEE_OTHER);
    }
}
