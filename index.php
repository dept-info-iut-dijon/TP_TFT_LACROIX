<?php

require_once 'Helpers/Psr4AutoloaderClass.php';

$loader = new \Helpers\Psr4AutoloaderClass;

$loader->register();

$loader->addNamespace('\Helpers', '/Helpers');
$loader->addNamespace('\League\Plates', 'Vendor/Plates/src');
$loader->addNamespace('\Controllers', '/Controllers');
$loader->addNamespace('\Models', '/Models');
$loader->addNamespace('\Config', '/Config');
$loader->addNamespace('\Controllers\Router', '/Controllers/Router');
$loader->addNamespace('\Controllers\Router\Route', '/Controllers/Router/Route');
$loader->addNamespace('Views', '/Views');

$router = new \Controllers\Router\Router();
$router->routing($_GET, $_POST);