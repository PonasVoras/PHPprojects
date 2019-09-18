<?php
namespace FileWriter\Controller;

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
        //TODO wait for input from
    }

    /**
     * Shows begin view, requests data
     */
    public function beginingAction()
    {
        $this->mainView->begin();
    }

    /**
     * Shows processing vies, handles data
     */
    public function processingAction(
        string $paremeters)
    {
        $parametersArray = $this->parser->parse($paremeters);
        $this->validator->validateParameters($parametersArray);
        $fileName = $parametersArray[0];
        $fileFormat = $parametersArray[1];
        $this->mainView->processing(
            $fileName, $fileFormat
        );

        //TODO when user inputted parameters, validate them
        //TODO If parameters are valid, pass
        //TODO pass filename and format to HexagonWriter
    }

    public function successAction()
    {
        $this->mainView->success();
    }
}