<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaveSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('leave_types')->insert([
            [
                'name' => 'Medical Leave',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vacation Leave',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Emergency Leave',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Maternity/Paternity Leave',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Study Leave',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sick Leave',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Family Leave',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Special Leave',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Educational Leave',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bereavement Leave',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Religious Leave',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Extracurricular Leave',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}