<?php

declare(strict_types=1);

namespace KataBank;

final class InMemoryTransactionRepository implements TransactionRepositoryInterface
{
    /**
     * @var list<Transaction>
     */
    private array $transactions = [];

    public function add(Transaction $transaction): void
    {
        $this->transactions[] = $transaction;
    }

    /**
     * @return list<Transaction>
     */
    public function getAll(): array
    {
        return $this->transactions;
    }
}
