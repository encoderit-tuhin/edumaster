<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default Departments
        DB::table('payment_methods')->insert([
            [
                'name' => 'Bank account',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bkash',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cash',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cash By AH',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'CASH-001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cash-Eduman Demo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'City general leger',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dutch-Bangla Bank',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Eastern,Dutch-Bangla',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Islami Bank',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MANIK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nizam cash',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
