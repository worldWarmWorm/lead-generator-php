<?php

declare(strict_types=1);

namespace Infrastructure;

use Psr\Container\NotFoundExceptionInterface;

class ContainerException extends \RuntimeException implements NotFoundExceptionInterface
{

}