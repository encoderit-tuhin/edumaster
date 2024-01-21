<?php

namespace Database\Seeders;

use App\StudentCategory;
use Illuminate\Database\Seeder;

class StudentCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student_categories = [
            'General',
            'Day Care',
            'CIVIL',
            'Darul',
            'BGB',
            'Residential',
            'Transport',
            'Non-Residential',
            'Disable',
            'Special',
            'Autistic',
            'N/A',
            'A',
            'B',
            'C',
            'D',
            'Night Care',
        ];

        foreach ($student_categories as $student_category) {
            StudentCategory::create(
                [
                    'name' => $student_category,
                ]
            );
        }
    }
}
