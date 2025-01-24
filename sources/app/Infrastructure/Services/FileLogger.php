<?php

declare(strict_types=1);

namespace Infrastructure\Services;

use Infrastructure\Contracts\Logger;

final readonly class FileLogger implements Logger
{
    public function __construct(private string $path) {}

    public function log(string $message): void
    {
        file_put_contents($this->path, $message, FILE_APPEND);
    }
}
