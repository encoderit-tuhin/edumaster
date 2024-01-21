<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaiverTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('waivers')->insert([
            [
                'waiver' => 'Class Waiver',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'waiver' => 'Girl Waiver',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'waiver' => 'Merit Waiver',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'waiver' => 'Poor Waiver',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'waiver' => 'Scout Waiver',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'waiver' => 'BNCC Waiver',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'waiver' => 'Special Waiver',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'waiver' => 'Govt. Waiver',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'waiver' => 'Invention Waiver',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'waiver' => 'Creative Waiver',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'waiver' => 'Other Waiver',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
