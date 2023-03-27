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
                    'label' => 'Reussite (en %)',
                    'backgroundColor' => 'rgba(0, 128, 255, 0.7)',
                    'borderColor' => 'rgb(0, 128, 255)',
                    'borderWidth' => '2',
                    'barPercentage' => '1',
                    'categoryPercentage' => '0.3',
                    'data' => [90],
                ],
                [
                    'label' => 'Echec (en %)',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.7)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'borderWidth' => '2',
                    'barPercentage' => '1',
                    'categoryPercentage' => '0.3',
                    
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

                    'gridLines' => [
                        'display' => false, // Supprimer le grillage de fond
                    ],
        ]);

        $chart1 = $chartBuilder->createChart(Chart::TYPE_BAR);

        $chart1->setData([
            'labels' => ['CDA'],
            'datasets' => [
                [
                    'label' => 'Reussite (en %)',
                    'backgroundColor' => 'rgba(0, 128, 255, 0.7)',
                    'borderColor' => 'rgb(0, 128, 255)',
                    'borderWidth' => '2',
                    'barPercentage' => '1',
                    'categoryPercentage' => '0.3',
                    'data' => [80],
                ],

                    [
                        'label' => 'Echec (en %)',
                        'backgroundColor' => 'rgba(255, 99, 132, 0.7)',
                        'borderColor' => 'rgb(255, 99, 132)',
                        'borderWidth' => '2',
                        'barPercentage' => '1',
                        'categoryPercentage' => '0.3',
                        'data' => [20],
                    
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
            'labels' => ['UI Designer'],
            'datasets' => [
                [
                    'label' => 'Reussite (en %)',
                    'backgroundColor' => 'rgba(0, 128, 255, 0.7)',
                    'borderColor' => 'rgb(0, 128, 255)',
                    'borderWidth' => '2',
                    'barPercentage' => '1',
                    'categoryPercentage' => '0.3',
                    'data' => [50],
                ],
                [
                    'label' => 'Echec (en %)',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.7)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'borderWidth' => '2',
                    'barPercentage' => '1',
                    'categoryPercentage' => '0.3',
                    'data' => [50],
                
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
            'labels' => ['TSSR'],
            'datasets' => [
                [
                    'label' => 'Reussite (en %)',
                    'backgroundColor' => 'rgba(0, 128, 255, 0.7)',
                    'borderColor' => 'rgb(0, 128, 255)',
                    'borderWidth' => '2',
                    'barPercentage' => '1',
                    'categoryPercentage' => '0.3',
                    'data' => [100],

                ],
                [
                    'label' => 'Echec (en %)',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.7)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'borderWidth' => '2',
                    'barPercentage' => '1',
                    'categoryPercentage' => '0.3',
                    'data' => [0],
                
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
            'labels' => ['WIS'],
            'datasets' => [
                [
                    'label' => 'Reussite (en %)',
                    'backgroundColor' => 'rgba(0, 128, 255, 0.7)',
                    'borderColor' => 'rgb(0, 128, 255)',
                    'borderWidth' => '2',
                    'barPercentage' => '1',
                    'categoryPercentage' => '0.3',
                    'data' => [75],

                ],

                [
                'label' => 'Echec (en %)',
                'backgroundColor' => 'rgba(255, 99, 132, 0.7)',
                'borderColor' => 'rgb(255, 99, 132)',
                'borderWidth' => '2',
                'barPercentage' => '1',
                'categoryPercentage' => '0.3',
                'data' => [25]
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

