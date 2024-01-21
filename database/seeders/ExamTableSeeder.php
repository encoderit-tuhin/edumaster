<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamTableSeeder extends Seeder
{
    public function run()
    {
        $exams = [
            [
                'name' => '1stTerm Marks-10',
                'note' => '1stTerm Marks-10',
                'session_id' => 1,
                'date_time' => now(),
                'exam_code' => rand(1000000, 9999999),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Promotion Marks-100 (i)',
                'note' => 'Promotion Marks-100 (i)',
                'session_id' => 1,
                'date_time' => now(),
                'exam_code' => rand(1000000, 9999999),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sent-Up Marks-100 (ii)',
                'note' => 'Sent-Up Marks-100 (ii)',
                'session_id' => 1,
                'date_time' => now(),
                'exam_code' => rand(1000000, 9999999),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('exams')->insert($exams);
    }
}