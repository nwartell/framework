<?php

// Set headers
header('Content-Type: text/html; charset=utf-8');

// Autoloader
require_once __DIR__ . '/../../vendor/autoload.php';

$dotenvPath = __DIR__ . '/../../';
$dotenv = Dotenv\Dotenv::createImmutable($dotenvPath);
$dotenv->load();

// Call constants
require_once __DIR__.'/constants.php';

// Bootstrap functions
function useModel(string $modelname) {
    require_once PATH_PREPEND.'Models/'.$modelname.'.php';
}
function useController(string $controllername) {
    if ($controllername === 'central') {
        require_once PATH_PREPEND.'Controllers/_controller.php';
    } else {
        require_once PATH_PREPEND.'Controllers/'.$controllername.'.php';
    }
}
function useTemplate(string $templatename) {
    require_once PATH_PREPEND.'Templates/'.$templatename.'.php';
}
function useService(string $servicename) {
    require_once PATH_PREPEND.'Services/'.$servicename.'.php';
}

?>