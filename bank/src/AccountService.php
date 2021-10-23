<?php

declare(strict_types=1);

namespace KataBank;

use KataBank\Transaction\Deposit;
use KataBank\Transaction\Withdraw;

final class AccountService
{
    private ClockInterface $clock;
    private ConsoleInterface $console;
    private TransactionRepositoryInterface $transactionRepository;
    private LinesGeneratorInterface $linesGenerator;

    public function __construct(
        ClockInterface                $clock,
        ConsoleInterface              $console,
        InMemoryTransactionRepository $lines,
        LinesGeneratorInterface       $statementsPrinter
    ) {
        $this->clock = $clock;
        $this->console = $console;
        $this->transactionRepository = $lines;
        $this->linesGenerator = $statementsPrinter;
    }

    /**
     * Add an amount to the account.
     */
    public function deposit(int $amount): void
    {
        $this->transactionRepository->add(
            new Deposit($this->clock->currentDate(), $amount)
        );
    }

    /**
     * Remove an amount from the account.
     */
    public function withdraw(int $amount): void
    {
        $this->transactionRepository->add(
            new Withdraw($this->clock->currentDate(), $amount)
        );
    }

    /**
     * Print the statements containing all the transactions in the console.
     */
    public function printStatements(): void
    {
        $transactions = $this->transactionRepository->getAll();
        $lines = $this->linesGenerator->forTransactions($transactions);

        foreach ($lines as $line) {
            $this->console->printLine($line);
        }
    }
}
