<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalaryHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default salary_heads
        DB::table('salary_heads')->insert([
            [
                'name' => 'Basic',
                'type' => 'Addition',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Allowance',
                'type' => 'Addition',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Early Leave Fine',
                'type' => 'Deduction',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Festival Allowance',
                'type' => 'Addition',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Welfare Fund',
                'type' => 'Deduction',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Professional Tax',
                'type' => 'Deduction',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Conveyance',
                'type' => 'Addition',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Exam Hall Duty',
                'type' => 'Addition',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Incentive',
                'type' => 'Addition',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Medical',
                'type' => 'Addition',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
