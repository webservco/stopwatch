<?php

declare(strict_types=1);

namespace WebServCo\Stopwatch\Contract;

interface LapTimerInterface extends ToMillisecondsInterface
{
    /**
     * @return array<string,int>
     */
    public function getLaps(): array;

    public function getLapTime(string $name): int;

    /**
     * @return array<string,array<string,float>|float|int>
     */
    public function getStatistics(): array;

    public function getTotalTime(): int;

    public function lap(string $name): bool;

    public function start(?int $timeStart = null): bool;
}
