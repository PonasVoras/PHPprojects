<?php

declare(strict_types=1);

namespace FileWriter\HexagonWriter\Domain\WriteFormatManagement;

use FileWriter\Utils\FileWriterOperations;

/**
 * Class WriteCsv
 *
 * @package FileWriter\HexagonWriter\Domain\WriteFormatManagement
 */
class WriteCsv implements WriteInterface
{
    private $fileWriter;

    public function __construct()
    {
        $this->fileWriter =  new FileWriterOperations();
        echo "I will save Csv";
    }

    /**
     * This method can be used to convert file content to desired format.
     */
    public function convertDataToCsv()
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