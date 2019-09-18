<?php
namespace FileWriter\HexagonWriter\Domain\WriteFormatManagement;

use FileWriter\Utils\FileOperations;
use Utils\Config;

class WriteXml implements WriteInterface
{
    private $fileOperations;

    public function __construct()
    {
        $this->fileOperations = new FileOperations();
        $this->config = new Config();
        echo "I will save Xml";
    }

    public function save(string $data)
    {
        $filePath = $this->config
                ->getOutputFileBaseDir()
            . $this->config->getFileName() . ".xml";
        $this->fileOperations->writeFile($filePath,$data);
    }
}