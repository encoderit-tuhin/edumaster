<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default Departments
        DB::table('departments')->insert([
            [
                'id' => 1,
                'department_name' => 'Bangla',
                'slug' => 'bangla',
                'priority' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'department_name' => 'English',
                'slug' => 'english',
                'priority' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'department_name' => 'ICT',
                'slug' => 'ict',
                'priority' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'department_name' => 'Math',
                'slug' => 'math',
                'priority' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'department_name' => 'Physics',
                'slug' => 'physics',
                'priority' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'department_name' => 'Chemistry',
                'slug' => 'chemistry',
                'priority' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'department_name' => 'Biology',
                'slug' => 'biology',
                'priority' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'department_name' => 'Humanities',
                'slug' => 'humanities',
                'priority' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'department_name' => 'Business Studies',
                'slug' => 'business-studies',
                'priority' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
