<?php
namespace FileWriter\HexagonWriter\Domain\WriteFormatManagement;

use FileWriter\Utils\FileOperations;

class WriteXml implements WriteInterface
{
    private $fileOperations;

    public function __construct()
    {
        $this->fileOperations = new FileOperations();
        echo "I will save Xml";
    }

    public function save()
    {
        $this->fileOperations->writeFile("I was an xml");
    }
}