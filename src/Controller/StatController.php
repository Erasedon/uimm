<?php

namespace App\Controller;

use Symfony\UX\Chartjs\Model\Chart;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StatController extends AbstractController
{
    #[Route('/stat', name: 'app_stat')]
    public function index(ChartBuilderInterface $chartBuilder): Response
    {

        $chart = $chartBuilder->createChart(Chart::TYPE_BAR);

        $chart->setData([
            'labels' => ['Reussite', 'Echec'],
            'datasets' => [
                [
                    'label' => 'Développeur web et mobile',
                    'backgroundColor' => [

                        '#0080FF',
                        '#FF0000'
                    ],
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [90, 10],
                ],
            ],
        ]);

        $chart->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 100,
                ],
            ],
        ]);

        $chart1 = $chartBuilder->createChart(Chart::TYPE_BAR);

        $chart1->setData([
            'labels' => ['Reussite', 'Echec'],
            'datasets' => [
                [
                    'label' => 'CDA',
                    'backgroundColor' => [

                        '#0080FF',
                        '#FF0000'
                    ],
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [80, 20],
                ],
            ],
        ]);

        $chart1->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 100,
                ],
            ],
        ]);

        $chart2 = $chartBuilder->createChart(Chart::TYPE_BAR);

        $chart2->setData([
            'labels' => ['Reussite', 'Echec'],
            'datasets' => [
                [
                    'label' => 'UI Designer',
                    'backgroundColor' => [

                        '#0080FF',
                        '#FF0000'
                    ],
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [50, 50],
                ],
            ],
        ]);

        $chart2->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 100,
                ],
            ],
        ]);

        $chart3 = $chartBuilder->createChart(Chart::TYPE_BAR);

        $chart3->setData([
            'labels' => ['Reussite', 'Echec'],
            'datasets' => [
                [
                    'label' => 'TSSR',
                    'backgroundColor' => [

                        '#0080FF',
                        '#FF0000'
                    ],
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [100, 0],
                ],
            ],
        ]);

        $chart3->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 100,
                ],
            ],
        ]);

        $chart4 = $chartBuilder->createChart(Chart::TYPE_BAR);

        $chart4->setData([
            'labels' => ['Reussite', 'Echec'],
            'datasets' => [
                [
                    'label' => 'WIS',
                    'backgroundColor' => [

                        '#0080FF',
                        '#FF0000'
                    ],
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [75, 25],
                ],
            ],
        ]);

        $chart4->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 100,
                ],
            ],
        ]);

        

        return $this->render('stat/index.html.twig', [
            'controller_name' => 'StatController',
            'chart' => $chart,
            'chart1' => $chart1,
            'chart2' => $chart2,
            'chart3' => $chart3,
            'chart4' => $chart4,
        ]);
    }
    

    
}
