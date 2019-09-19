<?php

declare(strict_types=1);

namespace FileWriter\HexagonWriter\Application;

use FileWriter\HexagonWriter\Domain\CommandInterface;

/**
 * Interface CommandBusInterface
 *
 * @package FileWriter\HexagonWriter\Application
 */
interface CommandBusInterface
{
    public function execute(CommandInterface $command);
}