<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->insert([
            [
                'id' => 1,
                'class_id' => 1,
                'room_no' => 1101,
                'section_name' => 'Science 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 2,
                'class_id' => 1,
                'room_no' => 1102,
                'section_name' => 'Science 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'class_id' => 1,
                'room_no' => 1102,
                'section_name' => 'Science 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'class_id' => 1,
                'room_no' => 1102,
                'section_name' => 'Science 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'class_id' => 1,
                'room_no' => 1102,
                'section_name' => 'Science 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'class_id' => 1,
                'room_no' => 1102,
                'section_name' => 'Science 6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'class_id' => 1,
                'room_no' => 1102,
                'section_name' => 'Science 7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'class_id' => 1,
                'room_no' => 1102,
                'section_name' => 'Science 8',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'class_id' => 1,
                'room_no' => 1102,
                'section_name' => 'Science 9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'class_id' => 1,
                'room_no' => 1102,
                'section_name' => 'BST 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'class_id' => 1,
                'room_no' => 1102,
                'section_name' => 'Humanities 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'class_id' => 1,
                'room_no' => 1102,
                'section_name' => 'Humanities 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'class_id' => 1,
                'room_no' => 1102,
                'section_name' => 'Humanities 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'class_id' => 2,
                'room_no' => 1201,
                'section_name' => 'Science 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 15,
                'class_id' => 2,
                'room_no' => 1202,
                'section_name' => 'Science 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 16,
                'class_id' => 2,
                'room_no' => 1202,
                'section_name' => 'Science 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 17,
                'class_id' => 2,
                'room_no' => 1202,
                'section_name' => 'Science 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 18,
                'class_id' => 2,
                'room_no' => 1202,
                'section_name' => 'Science 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 19,
                'class_id' => 2,
                'room_no' => 1202,
                'section_name' => 'Science 6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 20,
                'class_id' => 2,
                'room_no' => 1202,
                'section_name' => 'Science 7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 21,
                'class_id' => 2,
                'room_no' => 1202,
                'section_name' => 'Science 8',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 22,
                'class_id' => 2,
                'room_no' => 1202,
                'section_name' => 'Science 9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 23,
                'class_id' => 2,
                'room_no' => 1202,
                'section_name' => 'BST 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 24,
                'class_id' => 2,
                'room_no' => 1202,
                'section_name' => 'Humanities 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 25,
                'class_id' => 2,
                'room_no' => 1202,
                'section_name' => 'Humanities 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 26,
                'class_id' => 2,
                'room_no' => 1202,
                'section_name' => 'Humanities 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);
    }
}
