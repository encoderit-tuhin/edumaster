<?php

declare(strict_types=1);

namespace app\Services;

use App\Transaction;

class PurchasesReturnService extends TransactionService
{
    protected string $transactionType = Transaction::PURCHASE_RETURN_TRANSACTION;
}