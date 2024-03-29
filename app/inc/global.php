<?php
// Set headers
header('Content-Type: text/html; charset=utf-8');

// Autoloader
require_once __DIR__ . '/../../vendor/autoload.php';

$dotenvPath = __DIR__ . '/../../';
$dotenv = Dotenv\Dotenv::createImmutable($dotenvPath);
$dotenv->load();

// Constants
const ROOT = '/app/';
const PUBLIC_DIR = '/public_html/app/';
const PATH_PREPEND = '../../app/';
const PATH_PREPEND_DIR = '/../../app/';
const DEFAULT_ROUTE = __DIR__ . PATH_PREPEND_DIR . 'controllers/index.php';

const SITENAME = 'Framework PHP'; // Will append page title

const ENDPOINT = 'http://localhost:8888/public_html/api/';

// Bootstrap functions
function useModel(string $modelname) {
    require_once PATH_PREPEND.'models/'.$modelname.'.php';
}
function useController(string $controllername) {
    if ($controllername === 'central') {
        require_once PATH_PREPEND.'controllers/_controller.php';
    } else {
        require_once PATH_PREPEND.'controllers/'.$controllername.'.php';
    }
}
function useTemplate(string $templatename) {
    require_once PATH_PREPEND.'templates/'.$templatename.'.php';
}

?>