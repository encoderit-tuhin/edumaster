<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exam_types = [
            [
                'exam_type_name' => 'Monthly Exam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'exam_type_name' => 'Half Yearly Exam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'exam_type_name' => 'Pre Test Exam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'exam_type_name' => 'Final Exam',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('exam_types')->insert($exam_types);
    }
}
