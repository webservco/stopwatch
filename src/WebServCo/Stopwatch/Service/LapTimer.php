<?php

declare(strict_types=1);

namespace WebServCo\Stopwatch\Service;

use OutOfBoundsException;
use WebServCo\Stopwatch\Contract\LapTimerInterface;
use WebServCo\Stopwatch\Contract\StopwatchInterface;

use function array_key_exists;
use function count;

final class LapTimer extends AbstractService implements LapTimerInterface
{
    /**
     * Lap storage.
     *
     * @var array<string,int>
     */
    private array $laps = [];

    public function __construct(private StopwatchInterface $stopwatch)
    {
    }

    /**
     * @return array<string,int>
     */
    public function getLaps(): array
    {
        return $this->laps;
    }

    public function getLapTime(string $name): int
    {
        if (!array_key_exists($name, $this->laps)) {
            throw new OutOfBoundsException('Lap data not found.');
        }

        return $this->laps[$name];
    }

    /**
     * @return array<string,array<string,float>|float|int>
     */
    public function getStatistics(): array
    {
        $laps = $this->getLaps();
        $data = [
            'laps' => [],
            'totalLaps' => count($laps),
            'totalTime' => $this->toMilliseconds($this->getTotalTime()),
        ];
        foreach ($laps as $lapName => $lapTime) {
            $data['laps'][$lapName] = $this->toMilliseconds($lapTime);
        }

        return $data;
    }

    public function getTotalTime(): int
    {
        return $this->stopwatch->getTotalTime();
    }

    public function lap(string $name): bool
    {
        $this->stopwatch->stop();

        $this->setLap($name, $this->stopwatch->getElapsedTime());

        return $this->start();
    }

    public function start(?int $timeStart = null): bool
    {
        return $this->stopwatch->start($timeStart);
    }

    private function setLap(string $name, int $time): bool
    {
        if (!array_key_exists($name, $this->laps)) {
            // Create lap if not exists.
            $this->laps[$name] = 0;
        }

        // Update lap.
        $this->laps[$name] += $time;

        return true;
    }
}
