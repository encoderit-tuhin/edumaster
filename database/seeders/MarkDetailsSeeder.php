<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarkDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mark_details')->insert([
            [
                'id' => 1,
                'mark_id' => 1,
                'mark_type' => 'Exam',
                'mark_value' => 90.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'mark_id' => 2,
                'mark_type' => 'Exam',
                'mark_value' => 70.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'mark_id' => 3,
                'mark_type' => 'Exam',
                'mark_value' => 60.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'mark_id' => 4,
                'mark_type' => 'Exam',
                'mark_value' => 80.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'mark_id' => 5,
                'mark_type' => 'Exam',
                'mark_value' => 50.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'mark_id' => 6,
                'mark_type' => 'Exam',
                'mark_value' => 60.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'mark_id' => 7,
                'mark_type' => 'Exam',
                'mark_value' => 80.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'mark_id' => 8,
                'mark_type' => 'Exam',
                'mark_value' => 50.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'mark_id' => 9,
                'mark_type' => 'Exam',
                'mark_value' => 90.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'mark_id' => 10,
                'mark_type' => 'Exam',
                'mark_value' => 70.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'mark_id' => 11,
                'mark_type' => 'Exam',
                'mark_value' => 50.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'mark_id' => 12,
                'mark_type' => 'Exam',
                'mark_value' => 80.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'mark_id' => 13,
                'mark_type' => 'Exam',
                'mark_value' => 80.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'mark_id' => 14,
                'mark_type' => 'Exam',
                'mark_value' => 80.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'mark_id' => 15,
                'mark_type' => 'Exam',
                'mark_value' => 60.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 16,
                'mark_id' => 16,
                'mark_type' => 'Exam',
                'mark_value' => 80.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 17,
                'mark_id' => 17,
                'mark_type' => 'Exam',
                'mark_value' => 80.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 18,
                'mark_id' => 18,
                'mark_type' => 'Exam',
                'mark_value' => 90.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 19,
                'mark_id' => 19,
                'mark_type' => 'Exam',
                'mark_value' => 90.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 20,
                'mark_id' => 20,
                'mark_type' => 'Exam',
                'mark_value' => 70.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 21,
                'mark_id' => 21,
                'mark_type' => 'Exam',
                'mark_value' => 70.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 22,
                'mark_id' => 22,
                'mark_type' => 'Exam',
                'mark_value' => 80.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
