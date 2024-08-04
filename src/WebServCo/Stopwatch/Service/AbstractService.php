<?php

declare(strict_types=1);

namespace WebServCo\Stopwatch\Service;

use function round;

abstract class AbstractService
{
    public function toMilliseconds(int $time, int $decimals = 6): float
    {
        return round($time / 1e+6, $decimals);
    }
}
