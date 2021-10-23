<?php

declare(strict_types=1);

namespace KataBank;

final class Clock implements ClockInterface
{
    private string $date;

    public function currentDate(): string
    {
        return $this->date;
    }

    public function setCurrentDate(string $date): void
    {
        $this->date = $date;
    }
}
