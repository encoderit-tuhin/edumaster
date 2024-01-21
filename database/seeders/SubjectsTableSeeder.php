<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    public function run()
    {
        $commonSubjects = [
            [
                'subject_name' => 'Bangla',
                'subject_code' => '101',
                'subject_type' => 'Compulsory',
                'class_id' => 1,
                'group_id' => 1,
                'full_mark' => 100,
                'pass_mark' => 33,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subject_name' => 'English',
                'subject_code' => '107',
                'subject_type' => 'Compulsory',
                'class_id' => 1,
                'group_id' => 1,
                'full_mark' => 100,
                'pass_mark' => 33,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subject_name' => 'Mathematics',
                'subject_code' => 'MATH101',
                'subject_type' => 'Compulsory',
                'class_id' => 1,
                'group_id' => 1,
                'full_mark' => 100,
                'pass_mark' => 33,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subject_name' => 'Physics',
                'subject_code' => 'PHY101',
                'subject_type' => 'Compulsory',
                'class_id' => 1,
                'group_id' => 1,
                'full_mark' => 100,
                'pass_mark' => 33,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subject_name' => 'Chemistry',
                'subject_code' => 'CHEM101',
                'subject_type' => 'Compulsory',
                'class_id' => 1,
                'group_id' => 1,
                'full_mark' => 100,
                'pass_mark' => 33,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subject_name' => 'Biology',
                'subject_code' => 'BIO101',
                'subject_type' => 'Compulsory',
                'class_id' => 1,
                'group_id' => 1,
                'full_mark' => 100,
                'pass_mark' => 33,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subject_name' => 'History and Civilization',
                'subject_code' => 'HIS101',
                'subject_type' => 'Elective',
                'class_id' => 1,
                'group_id' => 1,
                'full_mark' => 100,
                'pass_mark' => 33,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subject_name' => 'Geography and Environment',
                'subject_code' => 'GEO101',
                'subject_type' => 'Elective',
                'class_id' => 1,
                'group_id' => 1,
                'full_mark' => 100,
                'pass_mark' => 33,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subject_name' => 'Economics',
                'subject_code' => 'ECO101',
                'subject_type' => 'Elective',
                'class_id' => 1,
                'group_id' => 1,
                'full_mark' => 100,
                'pass_mark' => 33,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subject_name' => 'Computer Science and Applications',
                'subject_code' => 'CSA101',
                'subject_type' => 'Elective',
                'class_id' => 1,
                'group_id' => 1,
                'full_mark' => 100,
                'pass_mark' => 33,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subject_name' => 'Higher Math',
                'subject_code' => 'HM101',
                'subject_type' => 'Optional',
                'class_id' => 1,
                'group_id' => 1,
                'full_mark' => 100,
                'pass_mark' => 33,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        for ($classId = 1; $classId <= 7; $classId++) {
            $subjectsForClass = array_map(function ($subject) use ($classId) {
                $subject['class_id'] = $classId;
                return $subject;
            }, $commonSubjects);

            DB::table('subjects')->insert($subjectsForClass);
        }
    }
}
