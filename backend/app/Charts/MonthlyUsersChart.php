<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    protected $chart;

    public function __construct()
    {
        $this->chart = new LarapexChart();
    }

    public function build()
    {
        // return $this->chart->barChart()
        //     ->setTitle('User Registered')
        //     // ->setSubtitle('Wins during season 2021.')
        //     ->addData('Register', [6, 9, 3, 4, 10, 8])
        //     ->addData('Login', [7, 3, 8, 2, 6, 4])
        //     ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
        return $this->chart->barChart()
            ->setTitle('Sales during 2021.')
            ->setSubtitle('Physical sales vs Digital sales.')
            ->addData('Published posts', [4, 9, 5, 2, 1, 8])
            ->addData('Unpublished posts', [7, 2, 7, 2, 5, 4])
            ->setColors(['#34d399', '#f9a8d4'])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
