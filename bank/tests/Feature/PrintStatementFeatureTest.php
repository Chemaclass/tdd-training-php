<?php

declare(strict_types=1);

namespace KataBank\Tests\Feature;

use KataBank\AccountService;
use KataBank\ClockInterface;
use KataBank\ConsoleInterface;
use KataBank\InMemoryTransactionRepository;
use KataBank\LinesGenerator;
use PHPUnit\Framework\TestCase;

final class PrintStatementFeatureTest extends TestCase
{
    public function test_print_statement_containing_all_transactions(): void
    {
//        date       || credit   || debit    || balance
//        14/01/2012 ||          || 500.00   || 2500.00
//        13/01/2012 || 2000.00  ||          || 3000.00
//        10/01/2012 || 1000.00  ||          || 1000.00

        $console = $this->createMock(ConsoleInterface::class);
        $console->expects(self::exactly(4))
            ->method('printLine')
            ->withConsecutive(
                ['date, credit, debit, balance'],
                ['14/01/2012, , 500, 2500'],
                ['13/01/2012, 2000, , 3000'],
                ['10/01/2012, 1000, , 1000'],
            );

        $clock = $this->createMock(ClockInterface::class);
        $clock->method('currentDate')
            ->willReturnOnConsecutiveCalls(
                '10/01/2012',
                '13/01/2012',
                '14/01/2012'
            );

        $accountService = new AccountService(
            $clock,
            $console,
            new InMemoryTransactionRepository(),
            new LinesGenerator()
        );

        $accountService->deposit(1000);
        $accountService->deposit(2000);
        $accountService->withdraw(500);

        $accountService->printStatements();
    }
}
