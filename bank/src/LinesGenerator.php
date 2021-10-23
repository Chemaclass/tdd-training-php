<?php

declare(strict_types=1);

namespace KataBank;

use KataBank\Transaction\TransactionInterface;

final class LinesGenerator implements LinesGeneratorInterface
{
    /**
     * @param list<TransactionInterface> $transactions
     *
     * @return list<string>
     */
    public function forTransactions(array $transactions): array
    {
        $lines = [];
        $balance = 0;

        foreach ($transactions as $transaction) {
            $balance += $transaction->amount();

            $lines[] = $this->generateLine($transaction, $balance);
        }

        $lines[] = 'date, credit, debit, balance';

        return array_reverse($lines);
    }

    private function generateLine(TransactionInterface $transaction, int $balance): string
    {
        if ($transaction->amount() > 0) {
            return $this->creditLine($transaction, $balance);
        }

        return $this->debitLine($transaction, $balance);
    }

    private function creditLine(TransactionInterface $transaction, int $balance): string
    {
        return sprintf(
            '%s, %s, %s, %s',
            $transaction->date(),
            $transaction->amount(),
            '',
            $balance
        );
    }

    private function debitLine(TransactionInterface $transaction, int $balance): string
    {
        return sprintf(
            '%s, %s, %s, %s',
            $transaction->date(),
            '',
            abs($transaction->amount()),
            $balance
        );
    }
}
