#!/usr/bin/env php
<?php

declare(strict_types=1);

use Consumer\ConsumerApp;
use Infrastructure\Contracts\Logger;
use Infrastructure\Contracts\Processor;
use Infrastructure\Contracts\Queue;
use Infrastructure\ServiceContainer;
use Psr\Clock\ClockInterface;

require __DIR__ . '/../../vendor/autoload.php';

$services = new ServiceContainer();

$consumer = new ConsumerApp(
    $services->get(Queue::class),
    $services->get(Processor::class),
    $services->get(Logger::class),
    $services->get(ClockInterface::class),
);

$consumer->run();
