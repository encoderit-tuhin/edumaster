<?php

namespace App;

class AccountingType
{
    const ASSET = 'asset';
    const LIABILITY = 'liability';
    const EQUITY = 'equity';
    const REVENUE = 'revenue';
    const EXPENSE = 'expense';

    public static function getTypes(): array
    {
        return [
            self::ASSET => [
                'name' => 'Assets',
                'nature' => 'debit'
            ],
            self::LIABILITY => [
                'name' => 'Liabilities',
                'nature' => 'credit'
            ],
            self::EQUITY => [
                'name' => 'Equity',
                'nature' => 'credit'
            ],
            self::REVENUE => [
                'name' => 'Revenue',
                'nature' => 'credit'
            ],
            self::EXPENSE => [
                'name' => 'Expense',
                'nature' => 'debit'
            ],
        ];
    }

    public static function getAccountingTypes(): array
    {
        return array_map(function ($type) {
            return $type['name'];
        }, self::getTypes());
    }

    public static function getAccountingNatureByType(string $type): ?string
    {
        return self::getTypes()[$type]['nature'] ?? null;
    }
}
