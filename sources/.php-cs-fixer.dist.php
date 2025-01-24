<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = (new Finder())
    ->in(__DIR__);

$config = (new Config())
    ->setCacheFile(__DIR__ . '/var/.php-cs-fixer.cache')
    ->setFinder($finder->exclude(['var', 'vendor']))
    ->setRiskyAllowed(true)
    ->setRules([
        '@PER-CS2.0' => true,
        '@PER-CS2.0:risky' => true,
    ]);


return $config;
