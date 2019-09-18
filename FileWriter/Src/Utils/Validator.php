<?php
namespace FileWriter\Utils;

use Exception;

class Validator
{
    const BASE_DIR = __DIR__ . "\..\InputFiles" . "\\";

    public function validateFile(string $fileName)
    {
        if(empty($fileName)){
            throw new Exception('No input filename provided');
        } elseif (!file_exists(self::BASE_DIR . $fileName . '.txt')){
            throw new Exception('File does not exist');
        };
    }
}