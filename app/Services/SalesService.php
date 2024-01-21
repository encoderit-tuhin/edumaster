<?php

declare(strict_types=1);

namespace App\Services;

use App\Transaction;

class SalesService extends TransactionService
{
    protected string $transactionType = Transaction::SALES_TRANSACTION;
}