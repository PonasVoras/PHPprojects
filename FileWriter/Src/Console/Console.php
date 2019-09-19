<?php

declare(strict_types=1);

namespace FileWriter\Console;

use FileWriter\Controller\MainController;
use Utils\InteractiveCli;

/**
 * Class Console
 *
 * @package FileWriter\Console
 */
class Console
{
    protected $controller;
    protected $cli;

    /**
     * Initializes the controller that is going to be used
     * Initializes interactiveCli class which interacts with cli
     */
    public function __construct()
    {
        $this->controller = new MainController();
        $this->cli = new InteractiveCli();
    }

    /**
     * Handles the cli.
     * Binds console with controller
     *
     * @throws \Exception
     */
    public function handle()
    {
        $this->controller->beginningAction();
        $data = $this->cli->requestData();
        $this->controller->processingAction($data);
        $this->controller->successAction();
    }
}