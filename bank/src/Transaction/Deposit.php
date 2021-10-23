<?php

declare(strict_types=1);

namespace KataBank\Transaction;

final class Deposit implements TransactionInterface
{
    private string $date;
    private int $amount;

    public function __construct(string $date, int $amount)
    {
        $this->date = $date;
        $this->amount = $amount;
    }

    public function date(): string
    {
        return $this->date;
    }

    public function amount(): int
    {
        return $this->amount;
    }
}
