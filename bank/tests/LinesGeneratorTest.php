<?php

declare(strict_types=1);

namespace KataBank\Tests;

use KataBank\LinesGenerator;
use KataBank\Transaction;
use KataBank\Transaction\Deposit;
use KataBank\Transaction\Withdraw;
use PHPUnit\Framework\TestCase;

final class LinesGeneratorTest extends TestCase
{
    private LinesGenerator $linesGenerator;

    public function setUp(): void
   {
       $this->linesGenerator = new LinesGenerator();
   }

    public function test_empty(): void
    {
        $actual = $this->linesGenerator->forTransactions([]);

        self::assertEquals(['date, credit, debit, balance'], $actual);
    }

    public function test_single_deposit_transaction(): void
    {
        $actual = $this->linesGenerator->forTransactions([
            new Deposit('2021-10-23', 500),
        ]);

        self::assertEquals([
            'date, credit, debit, balance',
            '2021-10-23, 500, , 500',
        ], $actual);
    }

    public function test_single_withdraw_transaction(): void
    {
        $actual = $this->linesGenerator->forTransactions([
            new Withdraw('2021-10-23', 500),
        ]);

        self::assertEquals([
            'date, credit, debit, balance',
            '2021-10-23, , 500, -500',
        ], $actual);
    }

    public function test_multiple_transactions(): void
    {
        $actual = $this->linesGenerator->forTransactions([
            new Deposit('2021-10-23', 2000),
            new Withdraw('2021-10-23', 500),
        ]);

        self::assertEquals([
            'date, credit, debit, balance',
            '2021-10-23, , 500, 1500',
            '2021-10-23, 2000, , 2000',
        ], $actual);
    }
}
