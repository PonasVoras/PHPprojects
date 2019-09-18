<?php

use FileWriter\Controller\MainController;
use Utils\AutoLoader;

require_once "../Utils/AutoLoader.php";
$loader = new AutoLoader();
$loader->register();
$loader->addNamespace('FileWriter', __DIR__ . '/../Src');
$loader->addNamespace('Utils', __DIR__ . '/../Utils');
$loader->addNamespace('Tests', __DIR__ . '/../Tests');

$controller = new MainController();
$controller->consoleInput($argv);