<?php

require_once 'Helpers/Psr4AutoloaderClass.php';

$loader = new \Helpers\Psr4AutoloaderClass;

$loader->register();

$loader->addNamespace('\Helpers', '/Helpers');
$loader->addNamespace('\League\Plates', 'Vendor/Plates/src');

// Instanciation de l'Engine avec le dossier des vues
$templates = new \League\Plates\Engine('Views');

// Appel de la fonction render() et affichage du résultat
echo $templates->render('home', ['tftSetName' => 'Bonjour']);