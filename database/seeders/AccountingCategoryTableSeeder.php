<?php

namespace Database\Seeders;

use App\AccountingCategory;
use Illuminate\Database\Seeder;

class AccountingCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Current Assets',
                'type' => 'Assets',
                'nature' => 'debit'
            ],
            [
                'name' => 'Cash & Cash Equivalence',
                'type' => 'Assets',
                'nature' => 'debit'
            ],
            [
                'name' => 'Fixed Assets',
                'type' => 'Assets',
                'nature' => 'debit'
            ],
            [
                'name' => 'Non-Current Assets',
                'type' => 'Assets',
                'nature' => 'debit'
            ],
            [
                'name' => 'Current Liabilities',
                'type' => 'Liabilities',
                'nature' => 'credit'
            ],
            [
                'name' => 'Non-Current Liabilities',
                'type' => 'Liabilities',
                'nature' => 'credit'
            ],
            [
                'name' => 'Owner’s Equity',
                'type' => 'Liabilities',
                'nature' => 'credit'
            ],
            [
                'name' => 'Fees Related Income',
                'type' => 'Income',
                'nature' => 'credit'
            ],
            [
                'name' => 'Others Income',
                'type' => 'Income',
                'nature' => 'credit'
            ],
            [
                'name' => 'General Expenses',
                'type' => 'Expenses',
                'nature' => 'debit'
            ],
            [
                'name' => 'Others Expenses',
                'type' => 'Expenses',
                'nature' => 'debit'
            ],
        ];

        AccountingCategory::insert($data);
    }
}
