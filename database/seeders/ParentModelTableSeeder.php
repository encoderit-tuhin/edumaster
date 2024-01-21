<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParentModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parents')->insert([
            [
                'id' => 1,
                'user_id' => 6,
                'parent_name' => 'Rahim Mia',
                'f_name' => 'Rahim Mia',
                'm_name' => 'Helena Begum',
                'f_profession' => 'Teacher',
                'm_profession' => 'Housewife',
                'phone' => 1,
                'address' => 'Vhaluka',
            ],
            [
                'id' => 2,
                'user_id' => 7,
                'parent_name' => 'Karim Mia',
                'f_name' => 'Karim Mia',
                'm_name' => 'Mhafuza Begum',
                'f_profession' => 'Teacher',
                'm_profession' => 'Housewife',
                'phone' => 1,
                'address' => 'Fulbari',
            ],
        ]);
    }
}
