<?php

declare(strict_types=1);

namespace KataBank;

final class LinesGenerator implements LinesGeneratorInterface
{
    /**
     * @param list<Transaction> $transactions
     *
     * @return list<string>
     */
    public function forTransactions(array $transactions): array
    {
        $lines = [];
        $balance = 0;

        foreach ($transactions as $transaction) {
            $balance += $transaction->amount();
            if ($transaction->amount() > 0) {
                $line = sprintf(
                    '%s, %s, %s, %s',
                    $transaction->date(),
                    $transaction->amount(),
                    '',
                    $balance
                );
            } else {
                $line = sprintf(
                    '%s, %s, %s, %s',
                    $transaction->date(),
                    '',
                    abs($transaction->amount()),
                    $balance
                );
            }
            $lines[] = $line;
        }

        $lines[] =  'date, credit, debit, balance';

        return array_reverse($lines);
    }
}
