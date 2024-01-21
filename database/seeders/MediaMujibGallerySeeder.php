<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaMujibGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default Departments
        DB::table('medias')->insert([
            [
                'id' => 1,
                'file' => 'mujib1.jpeg',
                'type' => 'image',
                'title' => 'mujib1',
                'media_category_id' => 17,
                'uploaded_by' => 1,
                'file_name' => 'mujib1.jpeg',
                'file_size' => '37.48 KB',
                'dimensions' => '612x402',
                'year' => 2023,
                'alt_text' => 'mujib1',
                'caption' => 'mujib1',
                'description' => 'mujib1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 2,
                'file' => 'mujib2.jpeg',
                'title' => 'mujib2',
                'media_category_id' => 17,
                'uploaded_by' => 1,
                'type' => 'image',
                'file_name' => 'mujib2.jpeg',
                'file_size' => '37.48 KB',
                'dimensions' => '612x402',
                'year' => '2023',
                'alt_text' => 'mujib2',
                'caption' => 'mujib2',
                'description' => 'mujib2',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 3,
                'file' => 'mujib3.jpeg',
                'title' => 'mujib3',
                'media_category_id' => 17,
                'uploaded_by' => 1,
                'type' => 'image',
                'file_name' => 'mujib3.jpeg',
                'file_size' => '37.48 KB',
                'dimensions' => '612x402',
                'year' => '2023',
                'alt_text' => 'mujib3',
                'caption' => 'mujib3',
                'description' => 'mujib3',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 4,
                'file' => 'mujib4.png',
                'title' => 'mujib4',
                'media_category_id' => 17,
                'uploaded_by' => 1,
                'type' => 'image',
                'file_name' => 'mujib4.png',
                'file_size' => '37.48 KB',
                'dimensions' => '612x402',
                'year' => '2023',
                'alt_text' => 'mujib4',
                'caption' => 'mujib4',
                'description' => 'mujib4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'file' => 'mujib5.jpeg',
                'title' => 'mujib5',
                'media_category_id' => 17,
                'uploaded_by' => 1,
                'type' => 'image',
                'file_name' => 'mujib5.jpeg',
                'file_size' => '37.48 KB',
                'dimensions' => '612x402',
                'year' => '2023',
                'alt_text' => 'mujib5',
                'caption' => 'mujib5',
                'description' => 'mujib5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
