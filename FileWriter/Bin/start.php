<?php

declare(strict_types=1);

use FileWriter\Console\Console;
use Utils\AutoLoader;

require_once "../Utils/AutoLoader.php";
$loader = new AutoLoader();
$loader->register();
$loader->addNamespace('FileWriter', __DIR__ . '/../Src');
$loader->addNamespace('Utils', __DIR__ . '/../Utils');
$loader->addNamespace('Tests', __DIR__ . '/../Tests');

/**
 * Starts a new console application
 */
$console = new Console();
$console->handle();