<?php
namespace FileWriter\Controller;

use Exception;
use FileWriter\View\MainView;
use FileWriter\Utils\Validator;

class MainController
{
    protected $mainView;
    protected $validator;
add
    /**
     * MainController constructor.
     *
     * Initializes Views
     * Initializes Validator, used for filename
     */
    public function __construct()
    {
        $this->mainView = new MainView();
        $this->validator = new Validator();
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