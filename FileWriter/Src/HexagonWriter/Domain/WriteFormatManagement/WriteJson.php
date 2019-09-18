<?php
namespace FileWriter\HexagonWriter\Domain\WriteFormatManagement;

use FileWriter\Utils\FileOperations;

class WriteJson implements WriteInterface
{
    private $fileOperations;

    public function __construct()
    {
        $this->fileOperations = new FileOperations();
        echo "I will save Json";
    }

    public function save()
    {
        $this->fileOperations->writeFile("I was a json");
    }
}