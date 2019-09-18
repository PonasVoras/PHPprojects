<?php
namespace FileWriter\Console;

use FileWriter\Controller\MainController;
use Utils\InteractiveCli;

class Console
{
    protected $controller;
    protected $cli;

    /**
     * Initializes the controller that is going to be used
     */
    public function __construct()
    {
        $this->controller = new MainController();
        $this->cli = new InteractiveCli();
    }

    /**
     * Handles the cli.
     */
    public function handle()
    {
        $this->controller->beginningAction();
        $data = $this->cli->requestData();
        $this->controller->processingAction($data);
        $this->controller->successAction();
    }
}