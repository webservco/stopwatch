<?php

declare(strict_types=1);

namespace WebServCo\Stopwatch\Service;

use WebServCo\Stopwatch\Contract\StopwatchInterface;

use function hrtime;
use function is_int;

final class Stopwatch implements StopwatchInterface
{
    private int $timeStart = 0;
    private int $timeStop = 0;
    private int $elapsedTime = 0;
    private int $totalTime = 0;

    public function getElapsedTime(): int
    {
        return $this->elapsedTime;
    }

    public function getTotalTime(): int
    {
        return $this->totalTime;
    }

    public function start(?int $timeStart = null): bool
    {
        $this->timeStart = is_int($timeStart)
            ? $timeStart
            : (int) hrtime(true);

        return $this->clearElapsedTime();
    }

    public function stop(): bool
    {
        $this->timeStop = (int) hrtime(true);

        $this->updateElapsedTime();

        $this->clearStartStop();

        return $this->updateTotalTime();
    }

    private function clearElapsedTime(): bool
    {
        $this->elapsedTime = 0;

        return true;
    }

    private function clearStartStop(): bool
    {
        $this->timeStart = 0;
        $this->timeStop = 0;

        return true;
    }

    private function updateElapsedTime(): bool
    {
        $this->elapsedTime = $this->timeStop - $this->timeStart;

        return true;
    }

    private function updateTotalTime(): bool
    {
        $this->totalTime += $this->elapsedTime;

        return true;
    }
}
