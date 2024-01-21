<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeeHeadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fee_heads = [
            [
                'name' => 'Monthly Fee',
                'serial' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Lab Fee',
                'serial' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Day Care Fees',
                'serial' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Tuition Fess',
                'serial' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Hostel Fees',
                'serial' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'ICT Fees',
                'serial' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Session Charge',
                'serial' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Study Tour',
                'serial' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Coaching Fees',
                'serial' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Transport Fees',
                'serial' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'BNCC Fee',
                'serial' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Sports Fee',
                'serial' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Admission Test',
                'serial' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Class Test',
                'serial' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Residential Fees',
                'serial' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Session 1',
                'serial' => 16,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'HALF YEARLY EXAM',
                'serial' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Model Test',
                'serial' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Netizen fee',
                'serial' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'New Admission',
                'serial' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Semester Exam',
                'serial' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Attendance Fine',
                'serial' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Exam Fees',
                'serial' => 23,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'School Uniform Male',
                'serial' => 24,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'School Uniform Female',
                'serial' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Re Admission',
                'serial' => 26,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('fee_heads')->insert($fee_heads);
    }
}
