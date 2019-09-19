<?php

declare(strict_types=1);

namespace FileWriter\Utils;

/**
 * Class FileOperations
 *
 * @package FileWriter\Utils
 */
class FileOperations
{
    /**
     * @param string $filePath
     * @return string
     */
    public function readFile(string $filePath): string
    {
        return file_get_contents($filePath);
    }

    /**
     * @param string $filePath
     * @param string $data
     */
    public function writeFile(string $filePath, string $data)
    {
        file_put_contents($filePath, $data);
    }
}