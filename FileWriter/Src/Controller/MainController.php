<?php

namespace FileWriter\Controller;

use Exception;
use FileWriter\HexagonWriter\Application\Command\WriteConfigCommand;
use FileWriter\HexagonWriter\Application\Command\WriteCommand;
use FileWriter\HexagonWriter\Application\SimpleCommandBus;
use FileWriter\Utils\Validator;
use FileWriter\View\MainView;
use Utils\Config;

class MainController
{
    protected $mainView;
    protected $validator;
    private $simpleCommandBus;
    private $writeCommand;
    private $writeConfigCommand;

    /**
     * MainController constructor.
     *
     * Initializes Views
     * Initializes Validator, used for filename
     */
    public function __construct()
    {
        $this->config = new Config();
        $this->mainView = new MainView();
        $this->validator = new Validator();
        $this->simpleCommandBus = new SimpleCommandBus();
        $this->writeCommand = new WriteCommand();
        $this->writeConfigCommand = new WriteConfigCommand();
    }

    /**
     * Shows begin view
     */
    public function beginningAction()
    {
        $this->mainView->begin();
    }

    /**
     * Shows processing view, handles data
     *
     * @param string $fileName
     * @throws Exception
     */
    public function processingAction(
        string $fileName
    ) {
        $this->validator->validateInput($fileName);
        $filePath = $this->config->getInputFileBaseDir().$fileName.".txt";
        $this->validator->validateFileExists($filePath);

        $this->mainView->processing($fileName);
        $this->config->setFileName($fileName);
        $this->simpleCommandBus->execute($this->writeCommand);
        //$this->simpleCommandBus->execute($this->writeConfigCommand);
    }

    /**
     * Shows success view
     */
    public function successAction()
    {
        $this->mainView->success();
    }
}