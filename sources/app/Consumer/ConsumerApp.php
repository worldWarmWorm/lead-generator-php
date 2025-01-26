<?php

declare(strict_types=1);

namespace Consumer;

use DateTimeInterface;
use Infrastructure\Contracts\Logger;
use Infrastructure\Contracts\Queue;
use Infrastructure\Definitions;
use Psr\Clock\ClockInterface;

final readonly class ConsumerApp
{
    private const int WAIT_TIME_MICROSECONDS = 100_000;

    public function __construct(
        private Queue $queue,
        private Logger $logger,
        private ClockInterface $clock,
    ) {}

    public function run(): void
    {
        for ($i = 0; $i <= Definitions::LEADS_COUNT; $i++) {
            $message = $this->queue->pop();

            if ($message === null) {
                usleep(self::WAIT_TIME_MICROSECONDS);
                continue;
            }

            sleep(Definitions::LEAD_PROCESS_TIME_SECONDS);
            $this->logger->log($this->modifyMessage($message));
        }
    }

    private function modifyMessage(string $message): string
    {
        return sprintf('%s | %s', $message, $this->clock->now()->format(DateTimeInterface::ATOM)) . PHP_EOL;
    }
}
