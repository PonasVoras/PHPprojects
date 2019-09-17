<?php
namespace FileWriter\Controller;

use FileWriter\View\MainView;

class MainController
{
    public function __construct()
    {
        new MainView();
    }
}