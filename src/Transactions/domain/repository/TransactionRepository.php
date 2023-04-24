<?php

namespace Red5g\Transactions\domain\repository;

use Red5g\Transactions\domain\entity\Transaction;

interface TransactionRepository
{
    public function save(Transaction $transaction): void;
}
