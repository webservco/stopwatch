<?php

declare(strict_types=1);

namespace WebServCo\Stopwatch\Contract;

interface StopwatchInterface
{
    public function getElapsedTime(): int;

    public function getTotalTime(): int;

    public function start(?int $timeStart = null): bool;

    public function stop(): bool;
}
