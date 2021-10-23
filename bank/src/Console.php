<?php

declare(strict_types=1);

namespace KataBank;

final class Console implements ConsoleInterface
{
    public function printLine(string $line): void
    {
        echo $line . PHP_EOL;
    }
}
