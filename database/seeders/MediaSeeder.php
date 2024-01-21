<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default Departments
        DB::table('medias')->insert([
            [
                'id' => 6,
                'file' => 'https://www.youtube.com/embed/FPLPRmAkqX0',
                'uploaded_by' => 1,
                'type' => 'video',
                'is_url' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'file' => 'https://www.youtube.com/embed/YvU3gf8Xcik',
                'uploaded_by' => 1,
                'type' => 'video',
                'is_url' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 8,
                'file' => 'https://www.youtube.com/embed/Ie2c9SvK-wk',
                'uploaded_by' => 1,
                'type' => 'video',
                'is_url' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'file' => 'https://www.youtube.com/embed/RdZZxWB5gSA',
                'uploaded_by' => 1,
                'type' => 'video',
                'is_url' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'file' => 'https://www.youtube.com/embed/kR2iTHzsVkk',
                'uploaded_by' => 1,
                'type' => 'video',
                'is_url' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'file' => 'https://www.youtube.com/embed/f-0cr85GMUo',
                'uploaded_by' => 1,
                'type' => 'video',
                'is_url' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
