<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classes')->insert([
            [
                'id' => 1,
                'class_name' => 'Eleven',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'class_name' => 'Twelve',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
