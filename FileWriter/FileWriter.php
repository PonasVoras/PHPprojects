<?php

use FileWriter\Controller\MainController;
use Utils\AutoLoader;
use Utils\Config;

require_once "Utils/AutoLoader.php";
$loader = new AutoLoader();
$loader->register();
$loader->addNamespace('FileWriter', __DIR__ . '/Src');
$loader->addNamespace('Utils', __DIR__ . '/Utils');
$loader->addNamespace('Tests', __DIR__ . '/Tests');

new Config();
$controller = new MainController();
$controller->consoleInput($argv);

// TODO : Call controller and pass console variabless