<?php

// Global Requirements
require_once '../../app/inc/global.php';
model_require('database');
controller_require('central');

// Route Logic
$full_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = extract_uri($full_uri);
$routepath = routeme($full_uri);

if (file_exists($routepath)) {

    require $routepath;

} else if ($uri === '') {

    require DEFAULT_ROUTE;

} else  {

    require __DIR__ . PATH_PREPEND_DIR . 'controllers/404.php';

}
?>