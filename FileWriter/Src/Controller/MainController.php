<?php
namespace FileWriter\Controller;

use FileWriter\View\MainView;

class MainController
{
    protected $mainView;

    public function __construct()
    {
        $this->mainView = new MainView();
    }

    public function consoleInput(array $parameters)
    {
        $fileName = $parameters[1];
        $fileFormat = $parameters[2];
        $this->mainView->processing($fileName, $fileFormat);
        //TODO pass filename and format to HexagonWriter
        $this->mainView->success();
    }

    /*
     * Controller can be populated with lots of types of inputs
     */
}