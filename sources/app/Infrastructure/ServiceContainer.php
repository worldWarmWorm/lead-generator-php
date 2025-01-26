<?php

declare(strict_types=1);

namespace Infrastructure;

use Infrastructure\Contracts\Logger;
use Infrastructure\Contracts\Queue;
use Infrastructure\Services\FileLogger;
use Infrastructure\Services\RedisQueue;
use Infrastructure\Services\WallClock;
use LeadGenerator\Generator;
use Psr\Clock\ClockInterface;
use Psr\Container\ContainerInterface;

final class ServiceContainer implements ContainerInterface
{
    /**
     * @var array<class-string, object>|null
     */
    private ?array $services = null;

    /**
     * @template T
     * @param string|class-string<T> $id
     * @return ($id is class-string<T> ? T : mixed)
     */
    public function get(string $id): mixed
    {
        return $this->services()[$id] ?? throw new ContainerException;
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->services());
    }

    /**
     * @return array<class-string, object>
     */
    private function services(): array
    {
        if ($this->services !== null) {
            return $this->services;
        }

        $this->services = [
            Queue::class => new RedisQueue(new \Redis(['host' => (string) getenv('REDIS_HOST')])),
            Logger::class => new FileLogger((string) getenv('LOG_PATH')),
            ClockInterface::class => new WallClock(),
            Generator::class => new Generator(),
        ];

        return $this->services;
    }
}
