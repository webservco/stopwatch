<?php

declare(strict_types=1);

namespace WebServCo\Stopwatch\Factory;

use Override;
use WebServCo\Stopwatch\Contract\LapTimerFactoryInterface;
use WebServCo\Stopwatch\Contract\LapTimerInterface;
use WebServCo\Stopwatch\Service\LapTimer;
use WebServCo\Stopwatch\Service\Stopwatch;

final class LapTimerFactory implements LapTimerFactoryInterface
{
    #[Override]
    public function createLapTimer(): LapTimerInterface
    {
        $stopwatch = new Stopwatch();

        return new LapTimer($stopwatch);
    }
}
