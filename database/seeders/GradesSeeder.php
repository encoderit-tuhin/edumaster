<?php

namespace Database\Seeders;

use App\Grade;
use Illuminate\Database\Seeder;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = [
            ['grade_name' => 'A+', 'marks_from' => 80, 'marks_to' => 100, 'point' => 5.0, 'note' => null],
            ['grade_name' => 'A', 'marks_from' => 70, 'marks_to' => 79, 'point' => 4.0, 'note' => null],
            ['grade_name' => 'A-', 'marks_from' => 60, 'marks_to' => 69, 'point' => 3.5, 'note' => null],
            ['grade_name' => 'B', 'marks_from' => 50, 'marks_to' => 59, 'point' => 3.0, 'note' => null],
            ['grade_name' => 'C', 'marks_from' => 40, 'marks_to' => 49, 'point' => 2.0, 'note' => null],
            ['grade_name' => 'D', 'marks_from' => 33, 'marks_to' => 39, 'point' => 1.0, 'note' => null],
            ['grade_name' => 'F', 'marks_from' => 0, 'marks_to' => 32, 'point' => 0.0, 'note' => null],
        ];

        foreach ($grades as $gradeData) {
            Grade::create($gradeData);
        }
    }
}
