<?php

declare(strict_types=1);

namespace KataBank\Tests\Unit;

use KataBank\InMemoryTransactionRepository;
use KataBank\Transaction\Deposit;
use KataBank\Transaction\Withdraw;
use PHPUnit\Framework\TestCase;

final class InMemoryTransactionRepositoryTest extends TestCase
{
    public function test_add(): void
    {
        $repository = new InMemoryTransactionRepository();
        $repository->add(new Deposit('2021-10-23', 100));
        $repository->add(new Withdraw('2021-10-24', 50));

        self::assertEquals(
            [
                new Deposit('2021-10-23', 100),
                new Withdraw('2021-10-24', 50),
            ],
            $repository->getAll()
        );
    }
}
