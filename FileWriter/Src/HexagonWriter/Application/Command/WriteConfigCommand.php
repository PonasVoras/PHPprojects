<?php
namespace FileWriter\HexagonWriter\Application\Command;

use FileWriter\HexagonWriter\Domain\CommandInterface;
use FileWriter\Utils\FileWriterOperations;

class WriteConfigCommand implements CommandInterface
{
    private $fileWriterOperations;

    public function __construct()
    {
        $this->fileWriterOperations = new FileWriterOperations();
    }

    public function data(): array
    {
        $data = $this->fileWriterOperations
            ->prepareConfigData();
        return $data;
    }
}