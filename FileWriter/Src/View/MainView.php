<?php

namespace FileWriter\View;

class MainView
{
    public function begin()
    {
        echo "Input the filename and required format \n";
    }

    public function processing(
        string $fileName)
    {
        echo "\n"."------------------------------";
        echo "\n".'FileName: ' . $fileName;
        echo "\n".'Writing operation in process ...';
    }

    public function success()
    {
        echo "\n"."Writing completed with success";
    }
}