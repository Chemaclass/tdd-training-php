<?php

declare(strict_types=1);

namespace KataBank\Tests;

use KataBank\InMemoryTransactionRepository;
use KataBank\Transaction;
use PHPUnit\Framework\TestCase;

final class InMemoryTransactionRepositoryTest extends TestCase
{
    public function test_add(): void
    {
        $repository = new InMemoryTransactionRepository();
        $repository->add(Transaction::deposit('2021-10-23', 100));
        $repository->add(Transaction::withdraw('2021-10-24', 50));

        self::assertEquals(
            [
                Transaction::deposit('2021-10-23', 100),
                Transaction::withdraw('2021-10-24', 50),
            ],
            $repository->getAll()
        );
    }
}
