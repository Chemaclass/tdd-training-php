<?php

declare(strict_types=1);

namespace KataBank;

interface ConsoleInterface
{
    public function printLine(string $line): void;
}
