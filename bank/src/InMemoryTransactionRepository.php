<?php

declare(strict_types=1);

namespace KataBank;

use KataBank\Transaction\TransactionInterface;

final class InMemoryTransactionRepository implements TransactionRepositoryInterface
{
    /**
     * @var list<TransactionInterface>
     */
    private array $transactions = [];

    public function add(TransactionInterface $transaction): void
    {
        $this->transactions[] = $transaction;
    }

    /**
     * @return list<TransactionInterface>
     */
    public function getAll(): array
    {
        return $this->transactions;
    }
}
