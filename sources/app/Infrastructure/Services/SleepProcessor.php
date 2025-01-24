<?php

declare(strict_types=1);

namespace Infrastructure\Services;

use Infrastructure\Contracts\Processor;
use Infrastructure\Definitions;

final readonly class SleepProcessor implements Processor
{
    public function process(string $message): void
    {
        sleep(Definitions::LEAD_PROCESS_TIME_SECONDS);
    }
}
