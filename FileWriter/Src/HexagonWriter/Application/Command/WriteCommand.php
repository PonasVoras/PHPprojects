<?php

declare(strict_types=1);

namespace FileWriter\HexagonWriter\Application\Command;

use FileWriter\HexagonWriter\Domain\CommandInterface;
use FileWriter\Utils\FileWriterOperations;

/**
 * Class WriteCommand.
 * Gets prepared data.
 *
 * @package FileWriter\HexagonWriter\Application\Command
 */
class WriteCommand implements CommandInterface
{
    private $fileWriterOperations;

    public function __construct()
    {
        $this->fileWriterOperations = new FileWriterOperations();
    }

    public function getPreparedData(): array
    {
        $data = $this->fileWriterOperations->prepareData();
        return $data;
    }
}