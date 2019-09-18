<?php
namespace FileWriter\HexagonWriter\Domain\WriteFormatManagement;

use FileWriter\Utils\FileOperations;

class WriteCsv implements WriteInterface
{
    private $fileOperations;

    public function __construct()
    {
        $this->fileOperations = new FileOperations();
        echo "I will save Csv";
    }

    public function save()
    {
        $this->fileOperations->writeFile("I was a csv");
    }
}