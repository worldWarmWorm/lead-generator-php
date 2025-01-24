<?php

declare(strict_types=1);

namespace Infrastructure\Services;

use Infrastructure\Contracts\Queue;
use Redis;

final readonly class RedisQueue implements Queue
{
    private const string LIST_NAME = 'leads_list';

    public function __construct(private Redis $redis) {}

    public function push(string $message): void
    {
        $this->redis->lPush(self::LIST_NAME, $message);
    }

    public function pop(): ?string
    {
        $value = $this->redis->lPop(self::LIST_NAME);

        return is_string($value) ? $value : null;
    }
}
