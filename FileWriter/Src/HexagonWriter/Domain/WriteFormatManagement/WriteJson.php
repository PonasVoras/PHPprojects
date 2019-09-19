<?php

declare(strict_types=1);

namespace FileWriter\HexagonWriter\Domain\WriteFormatManagement;

use FileWriter\Utils\FileWriterOperations;

/**
 * Class WriteJson
 *
 * @package FileWriter\HexagonWriter\Domain\WriteFormatManagement
 */
class WriteJson implements WriteInterface
{
    private $fileWriter;

    public function __construct()
    {
        $this->fileWriter =  new FileWriterOperations();
        echo "I will save Json";
    }

    /**
     * This method can be used to convert file content to desired format.
     */
    public function convertDataToJson()
    {

    }

    /**
     * Uses write command data and saves.
     *
     * @param array $data
     * @throws \Exception
     */
    public function save(array $data)
    {
        $format = strtolower($data['format']);
        $body = $data['data'];
        $name = $data['name'];
        $this->fileWriter->writeData($body, $format, $name);
    }
}