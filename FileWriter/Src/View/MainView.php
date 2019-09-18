<?php

namespace FileWriter\View;

class MainView
{
    public function processing(
        string $fileName,
        string $fileFormat)
    {
        echo "\n".'FileName: ' . $fileName;
        echo "\n".'FileFormat: ' . $fileFormat;
        echo "\n".'Writing operation in process ...';
    }

    public function success()
    {
        echo "\n"."Writing completed with success";
    }
}