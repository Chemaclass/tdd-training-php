<?php

declare(strict_types=1);

namespace KataBank\Tests;

use KataBank\Transaction;
use PHPUnit\Framework\TestCase;

final class TransactionTest extends TestCase
{
    public function test_create_deposit(): void
    {
        $t = Transaction::deposit('2021-10-23', 100);

        self::assertEquals('2021-10-23', $t->date());
        self::assertEquals(100, $t->amount());
    }
    public function test_create_withdraw(): void
    {
        $t = Transaction::withdraw('2021-10-23', 100);

        self::assertEquals('2021-10-23', $t->date());
        self::assertEquals(-100, $t->amount());
    }
}
