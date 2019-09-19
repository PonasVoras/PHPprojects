<?php

declare(strict_types=1);

namespace FileWriter\Utils;

use Utils\Config;

/**
 * Class FileWriterOperations
 *
 * @package FileWriter\Utils
 */
class FileWriterOperations extends FileOperations
{
    private $config;

    public function __construct()
    {
        $this->config = new Config();
    }

    /**
     * Reads the userFile, using parameters from configuration.
     * Puts desired format, userFile data, desired name
     *  into and array, used by 'WriteCommand'
     *
     * @return array
     * @throws \Exception
     */
    public function prepareData(): array
    {
        $path = $this->config->getInputFileBaseDir();
        $name = $this->config->getFileName();
        $format = $this->config::DEFAULT_USER_FILE_FORMAT;
        $filePath = $path . $name . $format;
        $data = $this->readFile($filePath);
        $format = $this->config->getWriteFormat();
        return $this->makeWriteDataArray($format, $data, $name);
    }

    /**
     * Reads the config, using parameters from configuration.
     * Puts desired format, config data, desired name
     *  into and array, used by 'WriteConfigCommand'
     *
     * @return array
     * @throws \Exception
     */
    public function prepareConfigData(): array
    {
        $filePath = $this->config::CONFIG_FILE;
        $data = $this->readFile($filePath);
        $format = $this->config->getConfigWriteFormat();
        $name = $this->config::CONFIG_NAME;
        return $this->makeWriteDataArray($format, $data, $name);
    }

    private function makeWriteDataArray(
        string $format,
        string $data,
        string $name)
    {
        return array(
            'format' => $format,
            'data' => $data,
            'name' => $name
        );
    }


    /**
     * Writes data received from WriteCommand, formatted by FormatFactory.
     * If name is null setts user defined name.
     *
     * @param string $data
     * @param string $format
     * @param string|null $name
     * @throws \Exception
     */
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