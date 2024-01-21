<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default Sliders
        DB::table('sliders')->insert([
            [
                'id' => 1,
                'title' => 'Welcome to Notre Dame College',
                'slug' => 'welcome-to-notre-dame-college',
                'image' => 'slider-1.jpeg',
                'priority' => 1,
                'status' => '1',
                'author_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Welcome to Notre Dame College Mymensingh ',
                'slug' => 'welcome-to-notre-dame-college-mymensingh-1',
                'image' => 'slider-2.jpeg',
                'priority' => 2,
                'status' => '1',
                'author_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'title' => 'Welcome to Notre Dame College Mymensingh',
                'slug' => 'welcome-to-notre-dame-college-mymensingh-2',
                'image' => 'slider-3.jpeg',
                'priority' => 3,
                'status' => '1',
                'author_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
