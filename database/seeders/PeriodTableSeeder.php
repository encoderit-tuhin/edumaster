<?php

namespace Database\Seeders;

use App\Period;
use Illuminate\Database\Seeder;

class PeriodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $periods = [
            '1st Period',
            '2nd Period',
            '3rd Period',
            '4th Period',
            '5th Period',
            '6th Period',
            '7th Period',
            '8th Period',
            '9th Period',
            '10th Period',
            '11th Period',
            '12th Period'
        ];

        foreach ($periods as $key => $period) {
            Period::create(
                [
                    'serial_no' => $key + 1,
                    'period' => $period,
                ]
            );
        }
    }
}
