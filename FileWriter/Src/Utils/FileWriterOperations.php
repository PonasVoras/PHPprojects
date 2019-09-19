<?php
namespace FileWriter\Utils;

use Utils\Config;

class FileWriterOperations extends FileOperations
{
    private $config;
    const DEFAULT_USER_FILE_FORMAT = '.txt';

    public function __construct()
    {
        $this->config = new Config();
    }

    public function prepareData(): array
    {
        $path = $this->config
                ->getInputFileBaseDir();
        $name = $this->config
                ->getFileName();
        $filePath = $path . $name . self::DEFAULT_USER_FILE_FORMAT;
        $data = $this->readFile($filePath);
        $format = $this->config->getWriteFormat();

        $writeData = array(
            'format' => $format,
            'data' => $data,
            'name' => $name
        );
        return $writeData;
    }


    public function prepareConfigData(): array
    {
        $filePath = $this->config::CONFIG_FILE;
        $data = $this->readFile($filePath);
        $format = $this->config->getConfigWriteFormat();

        $writeData = array(
            'format' => $format,
            'data' => $data,
            'name' => "config"
        );
        return $writeData;
    }

    public function writeData(
        string $data,
        string $format,
        string $name = null
    )
    {
        !empty($name) ? :$name =$this->config->getFileName();
        $path = $this->config->getOutputFileBaseDir();
        $filePath = $path . $name .".".$format;
        $this->writeFile($filePath, $data);
    }
}