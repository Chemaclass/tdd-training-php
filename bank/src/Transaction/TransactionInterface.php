<?php

declare(strict_types=1);

namespace KataBank\Transaction;

interface TransactionInterface
{
    public function date(): string;

    public function amount(): int;
}
