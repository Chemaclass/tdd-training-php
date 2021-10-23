<?php

declare(strict_types=1);

namespace KataBank;

use KataBank\Transaction\TransactionInterface;

interface TransactionRepositoryInterface
{
    public function add(TransactionInterface $transaction): void;

    /**
     * @return list<TransactionInterface>
     */
    public function getAll(): array;
}
