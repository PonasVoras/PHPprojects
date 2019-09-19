<?php
namespace FileWriter\HexagonWriter\Domain\WriteFormatManagement;

use FileWriter\Utils\FileWriterOperations;

class WriteCsv implements WriteInterface
{
    private $fileWriter;

    public function __construct()
    {
        $this->fileWriter =  new FileWriterOperations();
        echo "I will save Csv";
    }

    public function convertDataToCsv()
    {

    }

    public function save(array $data)
    {
        $format = strtolower($data['format']);
        $data = $data['data'];
        $this->fileWriter->writeData($data, $format);
    }
}