<?php

declare(strict_types=1);

namespace WebServCo\Stopwatch\Contract;

interface LapTimerFactoryInterface
{
    public function createLapTimer(): LapTimerInterface;
}
