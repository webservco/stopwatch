<?php

declare(strict_types=1);

namespace WebServCo\Stopwatch\Contract;

interface LapTimerInterface
{
    /**
     * @return array<string,int>
     */
    public function getLaps(): array;

    public function getLapTime(string $name): int;

    public function getTotalTime(): int;

    public function lap(string $name): bool;

    public function start(?int $timeStart = null): bool;
}
