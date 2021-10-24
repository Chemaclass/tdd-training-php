<?php

declare(strict_types=1);

namespace KataBank\Tests\Unit;

use KataBank\Transaction\Deposit;
use KataBank\Transaction\Withdraw;
use PHPUnit\Framework\TestCase;

final class TransactionTest extends TestCase
{
    public function test_create_deposit(): void
    {
        $t = new Deposit('2021-10-23', 100);

        self::assertEquals('2021-10-23', $t->date());
        self::assertEquals(100, $t->amount());
    }

    public function test_create_withdraw(): void
    {
        $t = new Withdraw('2021-10-23', 100);

        self::assertEquals('2021-10-23', $t->date());
        self::assertEquals(-100, $t->amount());
    }
}
