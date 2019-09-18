<?php
namespace FileWriter\Controller;

use Exception;
use FileWriter\View\MainView;
use FileWriter\Utils\Validator;
use FileWriter\Utils\InputParser;

class MainController
{
    protected $mainView;
    protected $validator;
    private $parser;

    public function __construct()
    {
        $this->mainView = new MainView();
        $this->validator = new Validator();
        $this->parser = new InputParser();
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
     * @param string $parameter
     * @throws Exception
     */
    public function processingAction(
        string $fileName)
    {
        $this->validator->validateFile($fileName);
        $this->mainView->processing($fileName);
        //TODO pass filename to HexagonWriter
    }


    /**
     * Shows success view
     */
    public function successAction()
    {
        $this->mainView->success();
    }
}