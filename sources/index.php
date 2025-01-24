<?php

declare(strict_types=1);

use Infrastructure\Services\WallClock;
use Producer\ProducerApp;
use Infrastructure\Contracts\Queue;
use Infrastructure\Definitions;
use Infrastructure\ServiceContainer;
use LeadGenerator\Generator;

require __DIR__ . '/vendor/autoload.php';

$services = new ServiceContainer();

$producer = new ProducerApp($services->get(Generator::class), $services->get(Queue::class));
$producer->run();

$consumersCount = intdiv(
    Definitions::LEADS_COUNT * Definitions::LEAD_PROCESS_TIME_SECONDS,
    Definitions::TIME_LIMIT_SECONDS,
) + 1;

for (; $consumersCount >= 0; $consumersCount--) {
    exec(__DIR__ . '/app/Consumer/consumer.php');
}
