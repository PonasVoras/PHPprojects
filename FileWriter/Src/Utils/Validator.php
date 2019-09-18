<?php
namespace FileWriter\Utils;

use Exception;
use Utils\Config;

class Validator
{
    private $config;

    /**
     * Initializes config class, that enables
     * to use constants from the main config file.
     *
     * Validator constructor.
     */
    public function __construct()
    {
        $this->config = new Config();
    }

    /**
     * Validates if user input for fileName is valid.
     *
     * @param string $fileName
     * @throws Exception
     */
    public function validateFile(string $fileName)
    {
        $baseInputFileDir = $this->config->getInputFileBaseDir();
        $fullFileDir = $baseInputFileDir . $fileName . '.txt';
        if(empty($fileName)){
            throw new Exception('No input filename provided');
        } elseif (!file_exists($fullFileDir)){
            throw new Exception('File does not exist');
        };
    }
}