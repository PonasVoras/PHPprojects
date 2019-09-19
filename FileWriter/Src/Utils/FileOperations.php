<?php

namespace FileWriter\Utils;

class FileOperations
{
    public function readFile(string $filePath): string
    {
        return file_get_contents($filePath);
    }

    public function writeFile(string $filePath, string $data)
    {
        file_put_contents($filePath, $data);
    }
}