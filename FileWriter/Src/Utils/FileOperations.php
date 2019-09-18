<?php

namespace FileWriter\Utils;

use FileWriter\Utils\Validator;
use Utils\Config;

class FileOperations
{
    //TODO Config Sets a place
    private $inputFile = "" ;
    private $outputFile = "";
    private $config;

    public function __construct()
    {
        $this->config = new Config();
    }

    public function setInputFile(string $inputFileName)
    {
        $this->inputFile =$this->config
            ->getInputFileBaseDir() . $inputFileName;
    }

    public function setOutputFile(string $outputFileName)
    {
        $this->outputFile = $this->config
                ->getOutputFileBaseDir() . $outputFileName;
    }

    public function readFile(): array
    {
        return file($this->inputFile);
    }

    public function writeFile(string $data)
    {
        file_put_contents($this->outputFile, $data);
    }
}