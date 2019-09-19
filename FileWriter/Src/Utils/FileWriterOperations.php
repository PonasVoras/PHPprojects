<?php
namespace FileWriter\Utils;

use Utils\Config;

class FileWriterOperations extends FileOperations
{
    private $config;

    public function __construct()
    {
        $this->config = new Config();
    }

    public function prepareData(): array
    {
        $path = $this->config
                ->getInputFileBaseDir()
            . $this->config
                ->getFileName();
        $filePath = $path . '.txt';
        $data = $this->readFile($filePath);
        $format = $this->config->getWriteFormat();

        $writeData = array(
            'format' => $format,
            'data' => $data
        );
        return $writeData;
    }

    public function writeData(
        string $data,
        string $format
    )
    {
        $path = $this->config
                ->getOutputFileBaseDir()
            . $this->config
                ->getFileName();

        $filePath = $path.".".$format;
        $this->writeFile($filePath, $data);
    }
}