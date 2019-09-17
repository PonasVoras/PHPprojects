<?php

use FileWriter\Config\Config;
use FileWriter\Utils\AutoLoader;

require_once "Utils/AutoLoader.php";
$loader = new AutoLoader();
$loader->register();
$loader->addNamespace('FileWriter', __DIR__ . '/Src');
$loader->addNamespace('FileWriter', __DIR__ . '/Tests');
$loader->addNamespace('FileWriter', __DIR__ . '/Utils');
$loader->addNamespace('FileWriter', __DIR__ . '/Bin');

new Config();
// TODO : Call controller and pass console variables