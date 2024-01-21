<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class RolePermissionSeeder.
 *
 * @see https://spatie.be/docs/laravel-permission/v5/basic-usage/multiple-guards
 *
 * @package App\Database\Seeds
 */
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_has_roles')->insert([
            [
                'role_id' => 1,
                'model_type' => 'App\\User',
                'model_id' => 1,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 17,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 18,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 19,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 20,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 21,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 22,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 23,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 24,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 25,
            ],
        ]);
    }
}
