<?php

declare(strict_types=1);

namespace Infrastructure\Contracts;

interface Queue
{
    public function push(string $message): void;
    public function pop(): ?string;
}
