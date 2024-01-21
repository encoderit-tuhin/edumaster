<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PicklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default Sliders
        DB::table('picklists')->insert([
            // Religion
            [
                'id' => 1,
                'type' => 'Religion',
                'value' => 'Islam',
                'slug' => 'Islam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'type' => 'Religion',
                'value' => 'Christianity',
                'slug' => 'christianity',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'type' => 'Religion',
                'value' => 'Hinduism',
                'slug' => 'hinduism',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'type' => 'Religion',
                'value' => 'Buddhism',
                'slug' => 'Buddhism',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'type' => 'Religion',
                'value' => 'Others',
                'slug' => 'others',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Designation
            [
                'id' => 6,
                'type' => 'Designation',
                'value' => 'Department Head',
                'slug' => 'Department Head',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'type' => 'Designation',
                'value' => 'Lecturer',
                'slug' => 'Lecturer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'type' => 'Designation',
                'value' => 'Associate Professor',
                'slug' => 'Associate Professor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'type' => 'Designation',
                'value' => 'Professor',
                'slug' => 'Professor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 20,
                'type' => 'Designation',
                'value' => 'Principal',
                'slug' => 'Principal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 21,
                'type' => 'Designation',
                'value' => 'Director of administration and student guidance',
                'slug' => 'director-of-administration-and-student-guidance',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Add more staff designations here
            [
                'id' => 10,
                'type' => 'Staff Designation',
                'value' => 'Accounts Office',
                'slug' => 'Accounts Office',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'type' => 'Staff Designation',
                'value' => 'Exam Office',
                'slug' => 'Exam Office',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'type' => 'Staff Designation',
                'value' => 'IT Office',
                'slug' => 'IT Office',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'type' => 'Staff Designation',
                'value' => 'Library',
                'slug' => 'Library',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'type' => 'Staff Designation',
                'value' => 'Storekeeper',
                'slug' => 'Storekeeper',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'type' => 'Staff Designation',
                'value' => 'Lab Assistant',
                'slug' => 'Lab Assistant',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 16,
                'type' => 'Staff Designation',
                'value' => 'Maintenance',
                'slug' => 'Maintenance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 17,
                'type' => 'Staff Designation',
                'value' => 'Holy Cross Fathers Work Program',
                'slug' => 'Holy Cross Fathers Work Program',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 18,
                'type' => 'Staff Designation',
                'value' => 'Academic Office',
                'slug' => 'Academic Office',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        // slug build all of pickLists 
        DB::table('picklists')
            ->update([
                'slug' => DB::raw('LOWER(REPLACE(slug, " ", "-"))')
            ]);
    }
}
