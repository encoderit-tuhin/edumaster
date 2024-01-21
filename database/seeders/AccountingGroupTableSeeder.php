<?php

namespace Database\Seeders;

use App\AccountingGroup;
use Illuminate\Database\Seeder;

class AccountingGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            'Income From Fees',
            'Old Things Sells Income',
            'Bank Account',
            'Purchase of Inventory',
            'Sales of Inventory',
            'IT Equipment',
            'Others Current Liabilities',
            'Cash Account',
            'Others Current Assets',
            'Software Charge',
            'Others Miscellaneous Income',
            'Land & Buildings',
            'Furniture & Fixtures',
            'Electronic Equipment',
            'Vehicles',
            'Other Fixed Assets',
            'Good Will',
            'License',
            'Accounts Payable',
            'Account Receivable',
            'Short Term Loan',
            'Dividend Payable',
            'Integrated Bank',
            'Long Term Loan',
            'Opening Balance Equity',
            'Owner’s Equity',
            'Rental Income',
            'Commission Paid',
            'Donation',
            'Payroll Expenses',
            'Exam Expenses',
            'Advertising / Promotional',
            'Bad debt',
            'Loans to Employee'
        ];

        foreach ($groups as $key => $group) {
            AccountingGroup::create(
                [
                    'accounting_category_id' => rand(1, 11),
                    'name' => $group,
                ]
            );
        }
    }
}
