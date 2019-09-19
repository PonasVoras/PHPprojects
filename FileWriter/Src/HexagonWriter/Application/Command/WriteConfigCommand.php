<?php

declare(strict_types=1);

namespace FileWriter\HexagonWriter\Application\Command;

use FileWriter\HexagonWriter\Domain\CommandInterface;
use FileWriter\Utils\FileWriterOperations;

/**
 * Class WriteConfigCommand.
 * Gets prepared Config data.
 *
 * @package FileWriter\HexagonWriter\Application\Command
 */
class WriteConfigCommand implements CommandInterface
{
    private $fileWriterOperations;

    public function __construct()
    {
        $this->fileWriterOperations = new FileWriterOperations();
    }

    public function getPreparedData(): array
    {
        $data = $this->fileWriterOperations->prepareConfigData();
        return $data;
    }
}