<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceTimeConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'shift' => 'Morning Shift',
                'start_time' => '06:00:00',
                'end_time' => '15:00:00',
                'delay_time' => '00:10:00',
                'sms_status' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shift' => 'Day Shift',
                'start_time' => '08:00:00',
                'end_time' => '17:00:00',
                'delay_time' => '00:15:00',
                'sms_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('attendance_time_configs')->insert($data);
    }
}
