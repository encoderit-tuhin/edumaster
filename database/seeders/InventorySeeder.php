<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('item_categories')->insert([
            [
                'name' => 'book',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Scale',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Test',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Notebook',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pencil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Eraser',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('suppliers')->insert([
            [
                'name' => 'Rahinm Enterprice',
                'phone' => '01766987654',
                'address' => 'Dhaka',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Karim Store',
                'phone' => '01766554433',
                'address' => 'Rajshahi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bhai Bhai  Enterprice',
                'phone' => '01766987654',
                'address' => 'Dhaka',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Test1 Store',
                'phone' => '01766554433',
                'address' => 'Rajshahi',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        DB::table('items')->insert([
            [
                'name' => 'Pencil',
                'price' => '10',
                'opening_stock' => '100',
                'current_stock' => '100',
                'description' => 'Test pencil',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Books',
                'price' => '110',
                'opening_stock' => '100',
                'current_stock' => '50',
                'description' => 'Test Book',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pen',
                'price' => '10',
                'opening_stock' => '100',
                'current_stock' => '100',
                'description' => 'Test pencil',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Eraser',
                'price' => '110',
                'opening_stock' => '1100',
                'current_stock' => '1100',
                'description' => 'Test Book',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);
    }
}