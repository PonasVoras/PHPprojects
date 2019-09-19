<?php
namespace FileWriter\HexagonWriter\Domain\WriteFormatManagement;

use FileWriter\Utils\FileWriterOperations;

class WriteXml implements WriteInterface
{
    private $fileWriter;

    public function __construct()
    {
        $this->fileWriter =  new FileWriterOperations();
        echo "I will save Xml";
    }

    public function convertDataToXml()
    {

    }

    public function save(array $data)
    {
        $format = strtolower($data['format']);
        $body = $data['data'];
        $name = $data['name'];
        $this->fileWriter->writeData($body, $format, $name);
    }
}