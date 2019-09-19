<?php

declare(strict_types=1);

namespace FileWriter\Utils;

use Exception;

/**
 * Class Validator
 *
 * @package FileWriter\Utils
 */
class Validator
{
    const NO_FILE_EXCEPTION = 'File does not exist';
    const NO_INPUT_EXCEPTION = 'No input filename provided';
    const NO_CLASS_EXCEPTION = 'Class does not exist';

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

    /**
     * @param string $className
     * @throws Exception
     */
    public function validateClassExists(string $className)
    {
        if (!class_exists($className)) {
            throw new Exception(self::NO_CLASS_EXCEPTION);
        }
    }
}