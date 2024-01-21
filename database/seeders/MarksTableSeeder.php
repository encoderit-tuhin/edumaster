<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('marks')->insert([
            [
                'exam_id' => 1,
                'student_id' => 1,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'exam_id' => 1,
                'student_id' => 2,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'exam_id' => 1,
                'student_id' => 3,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'exam_id' => 1,
                'student_id' => 4,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'exam_id' => 1,
                'student_id' => 5,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'exam_id' => 1,
                'student_id' => 6,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'exam_id' => 1,
                'student_id' => 7,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'exam_id' => 1,
                'student_id' => 8,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'exam_id' => 1,
                'student_id' => 9,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'exam_id' => 1,
                'student_id' => 10,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'exam_id' => 2,
                'student_id' => 1,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'exam_id' => 2,
                'student_id' => 2,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'exam_id' => 2,
                'student_id' => 3,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'exam_id' => 2,
                'student_id' => 4,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'exam_id' => 2,
                'student_id' => 5,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'exam_id' => 2,
                'student_id' => 6,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'exam_id' => 2,
                'student_id' => 7,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'exam_id' => 2,
                'student_id' => 8,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'exam_id' => 2,
                'student_id' => 9,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'exam_id' => 2,
                'student_id' => 10,
                'class_id' => 1,
                'section_id' => 1,
                'subject_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
