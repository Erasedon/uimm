<?php

namespace App\Controller\Admin;

use App\Entity\Stats;
use App\Form\StatsType;
use App\Repository\StatsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/stats')]
class StatsController extends AbstractController
{
    #[Route('/', name: 'app_admin_stats_index', methods: ['GET'])]
    public function index(StatsRepository $statsRepository): Response
    {
        return $this->render('admin/stats/index.html.twig', [
            'stats' => $statsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_stats_new', methods: ['GET', 'POST'])]
    public function new(Request $request, StatsRepository $statsRepository): Response
    {
        $stat = new Stats();
        $form = $this->createForm(StatsType::class, $stat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $statsRepository->save($stat, true);

            return $this->redirectToRoute('app_stats_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/stats/new.html.twig', [
            'stat' => $stat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_stats_show', methods: ['GET'])]
    public function show(Stats $stat): Response
    {
        return $this->render('admin/stats/show.html.twig', [
            'stat' => $stat,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_stats_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Stats $stat, StatsRepository $statsRepository): Response
    {
        $form = $this->createForm(StatsType::class, $stat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $statsRepository->save($stat, true);

            return $this->redirectToRoute('app_stats_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/stats/edit.html.twig', [
            'stat' => $stat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_stats_delete', methods: ['POST'])]
    public function delete(Request $request, Stats $stat, StatsRepository $statsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stat->getId(), $request->request->get('_token'))) {
            $statsRepository->remove($stat, true);
        }

        return $this->redirectToRoute('app_stats_index', [], Response::HTTP_SEE_OTHER);
    }
}
