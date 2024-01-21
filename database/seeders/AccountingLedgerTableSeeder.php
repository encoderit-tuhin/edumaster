<?php

namespace Database\Seeders;

use App\AccountingLedger;
use Illuminate\Database\Seeder;

class AccountingLedgerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ledgers = [
            'Fess',
            'City general leger',
            'Fee Collection',
            'Electricity Bill',
            'Fee Fine Collection',
            'Staff Salary',
            'Netizen Bill Payment',
            'Cash',
            'Admission Fee Collection',
            'Others Income',
            'Cash by old Asset',
            'Eastern,Dutch-Bangla',
            'Exam Fees',
            'Tuition Fees',
            'Sales Inventory',
            'Income Inventory',
            'Computer',
            'Courier Charge',
            'Yearly Coaching Fees',
            'Servicing Charge',
            'Fees correction',
            'Display Charge',
            'Lab Fees',
            'Donation',
            'Session Charge',
            'Club Fees',
            'Transport',
            'Student tour',
        ];

        foreach ($ledgers as $ledger) {
            AccountingLedger::create(
                [
                    'ledger_name' => $ledger,
                    'accounting_category_id' =>  rand(1, 11),
                    'accounting_group_id' => rand(1, 30),
                ]
            );
        }

        $ledgers = [
            'Bkash',
            'Nagad',
            'Office Stationary',
            'SSL - Mobile Banking',
        ];

        foreach ($ledgers as $ledger) {
            AccountingLedger::create(
                [
                    'ledger_name' => $ledger,
                    'accounting_category_id' =>  rand(1, 11),
                    'accounting_group_id' => rand(1, 30),
                    'type' => 'payment'
                ]
            );
        }
    }
}
