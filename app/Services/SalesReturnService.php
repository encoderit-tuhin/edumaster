<?php

declare(strict_types=1);

namespace App\Services;

use App\Transaction;

class SalesReturnService extends TransactionService
{
    protected string $transactionType = Transaction::SALES_RETURN_TRANSACTION;
}