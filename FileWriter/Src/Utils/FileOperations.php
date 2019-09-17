<?php

namespace FileWriter\Utils;

class FileOperations
{
    //TODO Config Sets a place
    private $inputFileName = "";
    private $outputFileName = "";

    public function setInputFileName(string $inputFileName)
    {
        $this->inputFileName = $inputFileName;
    }

    public function setOutputFileName(string $outputFileName)
    {
        $this->outputFileName = $outputFileName;
    }

    public function exists(string $fileName): bool
    {
        try{
            if (!file_exists($fileName)){
                throw new \Exception('Input file does not exist');
            }
            return true;
        } catch (\Exception $e){
            echo $e->getMessage();
        }
        return true;
    }

    public function readFile(): array
    {
        $this->exists($this->inputFileName);
        return file($this->inputFileName);
    }

    public function writeFile(string $data)
    {
        $this->exists($this->outputFileName);
        file_put_contents($this->outputFileName, $data);
    }
}