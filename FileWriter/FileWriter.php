<?php

use FileWriter\Controller\MainController;
use FileWriter\Loader\AutoLoader;
use FileWriter\Utils\Config;

require_once "Loader/AutoLoader.php";
$loader = new AutoLoader();
$loader->register();
$loader->addNamespace('FileWriter', __DIR__ . '/Src');
$loader->addNamespace('FileWriter\Utils', __DIR__ . '/Utils');
$loader->addNamespace('FileWriter\Tests', __DIR__ . '/Tests');

new Config();
new MainController();

// TODO : Call controller and pass console variables