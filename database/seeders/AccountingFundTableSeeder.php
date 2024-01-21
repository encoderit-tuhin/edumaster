<?php

namespace Database\Seeders;

use App\AccountingFund;
use Illuminate\Database\Seeder;

class AccountingFundTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $funds = [
            'General Fund',
        ];

        foreach ($funds as $key =>  $fund) {
            AccountingFund::create(
                [
                    'name' => $fund,
                    'serial' =>  $key + 1
                ]
            );
        }
    }
}
