<?php
namespace FileWriter\HexagonWriter\Application\Command;

use FileWriter\HexagonWriter\Domain\CommandInterface;
use Utils\Config;
use FileWriter\Utils\FileOperations;

class WriteCommand implements CommandInterface
{
    private $config;
    private $fileOperations;

    public function __construct()
    {
        $this->config = new Config();
        $this->fileOperations = new FileOperations();
    }

    public function data(): string
    {
        $filePath = $this->config
            ->getInputFileBaseDir()
            . $this->config
            ->getFileName();
        $data = $this->fileOperations->readFile($filePath);
        echo "I am the write command";
        var_dump($data);
        return $data;
    }
}