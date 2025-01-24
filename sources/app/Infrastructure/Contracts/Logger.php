<?php

namespace Infrastructure\Contracts;

interface Logger
{
    public function log(string $message): void;
}
