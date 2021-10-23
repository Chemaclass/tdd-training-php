<?php

declare(strict_types=1);

namespace KataBank;

final class Transaction
{
    private string $date;
    private int $amount;

    public function __construct(string $date, int $amount)
    {
        $this->date = $date;
        $this->amount = $amount;
    }

    public static function deposit(string $date, int $amount): self
    {
        return new self($date, $amount);
    }

    public static function withdraw(string $date, int $amount): self
    {
        return new self($date, -$amount);
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
