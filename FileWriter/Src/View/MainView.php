<?php

namespace FileWriter\View;

class MainView
{
    public function processing()
    {
        echo 'Writing operation in process ...';
    }

    public function success()
    {
        echo "Writing completed with success";
    }
}