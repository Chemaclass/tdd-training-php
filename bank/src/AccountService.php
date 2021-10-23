<?php

declare(strict_types=1);

namespace KataBank;

final class AccountService
{
    private ConsoleInterface $console;
    private TransactionRepositoryInterface $transactionRepository;
    private LinesGeneratorInterface $linesGenerator;

    public function __construct(
        ConsoleInterface              $console,
        InMemoryTransactionRepository $lines,
        LinesGeneratorInterface $statementsPrinter
    ) {
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
            Transaction::deposit('12/12/1221', $amount)
        );
    }

    /**
     * Remove an amount from the account.
     */
    public function withdraw(int $amount): void
    {
        $this->transactionRepository->add(
            Transaction::withdraw('12/12/1221', $amount)
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
