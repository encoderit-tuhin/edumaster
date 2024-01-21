<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bank_accounts = [
            [
                'acc_holder_name' => 'SSL SureCash',
                'bank' => 'SSL',
                'branch' => 'Head Office',
                'account_no' => '019147000733',
                'balance' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'acc_holder_name' => 'SSL Bkash',
                'bank' => 'SSL',
                'branch' => 'Head Office',
                'account_no' => '01401171488',
                'balance' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'acc_holder_name' => 'SSL Nagad',
                'bank' => 'SSL',
                'branch' => 'Head Office',
                'account_no' => '01401195473',
                'balance' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('bank_accounts')->insert($bank_accounts);
    }
}
