<?php
namespace FileWriter\HexagonWriter\Domain\WriteFormatManagement;

use FileWriter\Utils\FileOperations;
use Utils\Config;

class WriteJson implements WriteInterface
{
    private $fileOperations;
    private $config;

    public function __construct()
    {
        $this->fileOperations = new FileOperations();
        $this->config = new Config();
        echo "I will save Json";
    }

    public function save(string $data)
    {
        $filePath = $this->config
                ->getOutputFileBaseDir()
            . $this->config->getFileName() . ".json";
        $this->fileOperations->writeFile($filePath,$data);
    }
}