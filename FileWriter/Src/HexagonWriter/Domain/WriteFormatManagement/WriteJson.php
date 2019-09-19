<?php
namespace FileWriter\HexagonWriter\Domain\WriteFormatManagement;

use FileWriter\Utils\FileWriterOperations;

class WriteJson implements WriteInterface
{
    private $fileWriter;

    public function __construct()
    {
        $this->fileWriter =  new FileWriterOperations();
        echo "I will save Json";
    }

    public function convertDataToJson()
    {

    }

    public function save(array $data)
    {
        $format = strtolower($data['format']);
        $data = $data['data'];
        $this->fileWriter->writeData($data, $format);
    }
}