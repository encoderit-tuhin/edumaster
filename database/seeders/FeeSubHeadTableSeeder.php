<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeeSubHeadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fee_sub_heads = [
            [
                'name' => '1st Semester Exam',
                'serial' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Admission Fee',
                'serial' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => '1st Parbik',
                'serial' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => '1st Model Test',
                'serial' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => '1st Tutorial Exam',
                'serial' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'name' => '2nd Model Test',
                'serial' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => '2nd MT',
                'serial' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => '2nd Semester Exam',
                'serial' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => '2nd TERM',
                'serial' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => '2nd Tutorial Exam',
                'serial' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => '2st Tutorial Exam',
                'serial' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => '3rd Model Test',
                'serial' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => '3rd MT',
                'serial' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => '3rd Parbik',
                'serial' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => '3rd Semister Exam',
                'serial' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'name' => '3rd TERM',
                'serial' => 16,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'name' => '3rd Tutorial Exam',
                'serial' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => '4th Model Test',
                'serial' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => '4th Semister Exam',
                'serial' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Admission Fees',
                'serial' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Half Yearly Exam',
                'serial' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Re Admission Fees',
                'serial' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Session Charge',
                'serial' => 23,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Sports Fee',
                'serial' => 24,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Study Tour Fees',
                'serial' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Test Exam',
                'serial' => 26,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'name' => 'EXAM FEE',
                'serial' => 27,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'name' => 'Netizen fee',
                'serial' => 28,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => '1st MT',
                'serial' => 29,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'name' => 'Annual Exam',
                'serial' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'name' => 'Yearly Coaching Fee',
                'serial' => 31,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Yearly',
                'serial' => 32,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Yearly income',
                'serial' => 33,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'New Add',
                'serial' => 34,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'January',
                'serial' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'February',
                'serial' => 36,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'March',
                'serial' => 37,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'April',
                'serial' => 38,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'May',
                'serial' => 39,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'June',
                'serial' => 39,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'July',
                'serial' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'August',
                'serial' => 41,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'September',
                'serial' => 42,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'October',
                'serial' => 43,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'November',
                'serial' => 44,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'December',
                'serial' => 45,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'name' => 'Jan Feb Mar April May June July Aug Sep Oct Nov Dec',
            //     'serial' => 46,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ];

        DB::table('fee_sub_heads')->insert($fee_sub_heads);
    }
}
