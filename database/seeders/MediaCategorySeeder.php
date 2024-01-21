<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default Departments
        DB::table('media_categories')->insert([
            [
                'id' => 1,
                'parent_media_category_id' => null,
                'name' => 'Image Gallery',
                'slug' => 'image-gallery',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 2,
                'parent_media_category_id' => null,
                'name' => 'Video Gallery',
                'slug' => 'video-gallery',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Parent Image Gallery
            [
                'id' => 3,
                'parent_media_category_id' => 1,
                'name' => 'Front Image',
                'slug' => 'front-image',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 4,
                'parent_media_category_id' => 1,
                'name' => 'Inauguration',
                'slug' => 'inauguration',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 5,
                'parent_media_category_id' => 1,
                'name' => 'Teachers',
                'slug' => 'teachers',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 6,
                'parent_media_category_id' => 1,
                'name' => 'Quenliven House',
                'slug' => 'quenliven-house',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 7,
                'parent_media_category_id' => 1,
                'name' => 'Class Room',
                'slug' => 'class-room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 8,
                'parent_media_category_id' => 1,
                'name' => 'Lab',
                'slug' => 'lab',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 9,
                'parent_media_category_id' => 1,
                'name' => 'Volunteer Alliance',
                'slug' => 'volunteer-alliance',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 10,
                'parent_media_category_id' => 1,
                'name' => 'Guest',
                'slug' => 'guest',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 11,
                'parent_media_category_id' => 1,
                'name' => 'Admission',
                'slug' => 'admission',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 12,
                'parent_media_category_id' => 1,
                'name' => 'Nobin Boron',
                'slug' => 'nobin-boron',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 13,
                'parent_media_category_id' => 1,
                'name' => 'Work',
                'slug' => 'work',
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'id' => 14,
                'parent_media_category_id' => 2,
                'name' => 'Video 1',
                'slug' => 'video-1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 15,
                'parent_media_category_id' => 2,
                'name' => 'Video 2',
                'slug' => 'video-2',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 16,
                'parent_media_category_id' => 2,
                'name' => 'Video 3',
                'slug' => 'video-3',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 17,
                'parent_media_category_id' => null,
                'name' => 'Mujib Gallery',
                'slug' => 'mujib-gallery',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
