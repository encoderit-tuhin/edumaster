<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles_spatie')->insert([
            [
                'id' => 1,
                'name' => 'Super Admin',
                'guard_name' => 'web',
            ],
            [
                'id' => 2,
                'name' => 'Staff',
                'guard_name' => 'web',
            ],
            [
                'id' => 3,
                'name' => 'Teacher',
                'guard_name' => 'web',
            ],
            [
                'id' => 4,
                'name' => 'Student',
                'guard_name' => 'web',
            ],
        ]);
    }
}
