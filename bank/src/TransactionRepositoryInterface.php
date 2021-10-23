<?php

declare(strict_types=1);

namespace KataBank;

interface TransactionRepositoryInterface
{
    public function add(Transaction $param): void;

    /**
     * @return list<Transaction>
     */
    public function getAll(): array;
}
