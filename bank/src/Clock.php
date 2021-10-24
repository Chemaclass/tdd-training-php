<?php

declare(strict_types=1);

namespace KataBank;

final class Clock implements ClockInterface
{
    public function currentDate(): string
    {
        return (new \DateTimeImmutable())->format('Y-m-s');
    }
}
