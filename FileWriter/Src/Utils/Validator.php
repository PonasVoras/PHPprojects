<?php
namespace FileWriter\Utils;

use Exception;

class Validator
{
    const NO_FILE_EXCEPTION = 'File does not exist';
    const NO_INPUT_EXCEPTION = 'No input filename provided';

    /**
     * @param string $fileName
     * @throws Exception
     */
    public function validateInput(string $fileName)
    {
        if(empty($fileName)){
            throw new Exception(self::NO_INPUT_EXCEPTION);
        }
    }

    /**
     * @param string $filePath
     * @throws Exception
     */
    public function validateFileExists(string $filePath)
    {
        if (!file_exists($filePath)){
            throw new Exception(self::NO_FILE_EXCEPTION);
        }
    }
}