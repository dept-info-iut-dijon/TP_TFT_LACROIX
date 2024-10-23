<?php

require_once 'Helpers/Psr4AutoloaderClass.php';

$loader = new \Helpers\Psr4AutoloaderClass;

$loader->register();

$loader->addNamespace('\Helpers', '/Helpers');
$loader->addNamespace('\League\Plates', 'Vendor/Plates/src');
$loader->addNamespace('\Controllers', '/Controllers');
$loader->addNamespace('\Models', '/Models');
$loader->addNamespace('\Config', '/Config');

$controller = new \Controllers\MainController();
$controller->index();