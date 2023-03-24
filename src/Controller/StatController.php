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
            'labels' => ['Développeur web'],
            'datasets' => [
                [
                    'label' => 'Reussite',
                    'backgroundColor' => 'rgba(0, 128, 255, 0.7)',
                    'barPercentage' => '0.35',

                    'data' => [90],
                ],
                [
                    'label' => 'Echec',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.7)',
                    'barPercentage' => '0.35',
                    
                    'data' => [10],
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

                        'rgba(0, 128, 255, 0.7)',
                        'rgba(255, 99, 132, 0.7)'
                    ],
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [80, 20],
                    'barPercentage' => '0.35',
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

                        'rgba(0, 128, 255, 0.7)',
                        'rgba(255, 99, 132, 0.7)'
                    ],
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [50, 50],
                    'barPercentage' => '0.35',
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

                        'rgba(0, 128, 255, 0.7)',
                        'rgba(255, 99, 132, 0.7)'
                    ],
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [100, 0],
                    'barPercentage' => '0.35',
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

                        'rgba(0, 128, 255, 0.7)',
                        'rgba(255, 99, 132, 0.7)'
                    ],
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [75, 25],
                    'barPercentage' => '0.35',
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

        $chartData = [
            [
                'label' => 'Développeur web et mobile (en %)',        'backgroundColor' => ['rgba(0, 128, 255, 0.7)', 'rgba(0, 128, 255, 0.7)'],
                'data' => [95, 5],
            ],
            [
                'label' => 'CDA  (en %)',        'backgroundColor' => ['rgba(255, 99, 132, 0.7)', 'rgba(255, 99, 132, 0.7)'],
                'data' => [87, 13],
            ],
            [
                'label' => 'UI Designer (en %)',        'backgroundColor' => ['#112c50', '#112c50'],
                'data' => [100, 0], 
            ],
            [
                'label' => 'TSSR (en %)',        'backgroundColor' => ['#ef6602', '#ef6602'],
                'data' => [73, 27],
            ],
            [
                'label' => 'WIS (en %)',        'backgroundColor' => ['#000000', '#000000'],
                'data' => [100, 0],
            ],
        ];

        $chart5 = $chartBuilder->createChart(Chart::TYPE_BAR);

        $chart5->setData([
            'labels' => ['Reussite', 'Echec'],
            'datasets' => $chartData,
        ]);

        $chart5->setOptions([
            'scales' => [
                'y' => ['suggestedMin' => 0,            'suggestedMax' => 100,],
            ],
        ]);


        return $this->render('stat/index.html.twig', [
            'controller_name' => 'StatController',
            'chart' => $chart,
            'chart1' => $chart1,
            'chart2' => $chart2,
            'chart3' => $chart3,
            'chart4' => $chart4,
            'chart5' => $chart5
        ]);
    }
}
