<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamSchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('exam_schedules')->insert([
            [
                'id' => 1,
                'exam_id' => 1,
                'class_id' => 1,
                'subject_id' => 1,
                'date' => '2023-11-16',
                'start_time' => '10:00:00',
                'end_time' => '13:00:00',
                'room' => '101',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'exam_id' => 2,
                'class_id' => 1,
                'subject_id' => 2,
                'date' => '2023-11-02',
                'start_time' => '10:00:00',
                'end_time' => '13:00:00',
                'room' => '102',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'exam_id' => 3,
                'class_id' => 1,
                'subject_id' => 3,
                'date' => '2023-11-17',
                'start_time' => '10:00:00',
                'end_time' => '13:00:00',
                'room' => '101',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'exam_id' => 4,
                'class_id' => 1,
                'subject_id' => 4,
                'date' => '2023-11-17',
                'start_time' => '10:00:00',
                'end_time' => '13:00:00',
                'room' => '101',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'exam_id' => 5,
                'class_id' => 1,
                'subject_id' => 5,
                'date' => '2023-11-17',
                'start_time' => '10:00:00',
                'end_time' => '13:00:00',
                'room' => '101',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'exam_id' => 6,
                'class_id' => 1,
                'subject_id' => 6,
                'date' => '2023-11-17',
                'start_time' => '10:00:00',
                'end_time' => '13:00:00',
                'room' => '101',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'exam_id' => 7,
                'class_id' => 1,
                'subject_id' => 7,
                'date' => '2023-11-17',
                'start_time' => '10:00:00',
                'end_time' => '13:00:00',
                'room' => '101',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'exam_id' => 8,
                'class_id' => 1,
                'subject_id' => 8,
                'date' => '2023-11-17',
                'start_time' => '10:00:00',
                'end_time' => '13:00:00',
                'room' => '101',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'exam_id' => 9,
                'class_id' => 1,
                'subject_id' => 9,
                'date' => '2023-11-17',
                'start_time' => '10:00:00',
                'end_time' => '13:00:00',
                'room' => '101',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'exam_id' => 10,
                'class_id' => 1,
                'subject_id' => 10,
                'date' => '2023-11-17',
                'start_time' => '10:00:00',
                'end_time' => '13:00:00',
                'room' => '101',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'exam_id' => 11,
                'class_id' => 1,
                'subject_id' => 11,
                'date' => '2023-11-17',
                'start_time' => '10:00:00',
                'end_time' => '13:00:00',
                'room' => '111',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
