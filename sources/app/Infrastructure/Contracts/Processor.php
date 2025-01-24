<?php

namespace Infrastructure\Contracts;

interface Processor
{
    public function process(string $message): void;
}
