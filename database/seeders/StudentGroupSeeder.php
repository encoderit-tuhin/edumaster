<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student_groups')->insert([
            [
                'group_name' => 'Science',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'group_name' => 'Business Studies',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'group_name' => 'Humanities',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
