<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeeWaiverTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fee_waivers = [
            [
                'name' => 'Girl waver',
                'serial' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Merit Waiver',
                'serial' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Poor Waiver',
                'serial' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Scout Waiver',
                'serial' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'BNCC',
                'serial' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'SPECIAL WAIVER',
                'serial' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Female Waiver',
                'serial' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Govt. Waiver',
                'serial' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Other',
                'serial' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Creative Waver',
                'serial' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Poor',
                'serial' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Scout',
                'serial' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Invention waiver',
                'serial' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('fee_waivers')->insert($fee_waivers);
    }
}
