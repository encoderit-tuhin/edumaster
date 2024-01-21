<?php

declare(strict_types=1);

namespace App\Services;

use App\Transaction;
use App\Services\TransactionService;

class PurchaseService extends TransactionService
{
    protected string $transactionType = Transaction::PURCHASE_TRANSACTION;
}