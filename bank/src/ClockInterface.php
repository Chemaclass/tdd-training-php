<?php

declare(strict_types=1);

namespace KataBank;

interface ClockInterface
{
     public function currentDate(): string;
}
