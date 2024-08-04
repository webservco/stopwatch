<?php

declare(strict_types=1);

namespace WebServCo\Stopwatch\Contract;

/**
 * @todo come up with a better name.
 */
interface ToMillisecondsInterface
{
    public function toMilliseconds(int $time, int $decimals = 6): float;
}
