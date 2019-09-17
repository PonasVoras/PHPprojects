<?php
namespace FileWriter\Controller;

use FileWriter\View\UserInteraction;

class MainController
{
    public function __construct()
    {
        new UserInteraction();
    }
}