<?php
// Initialize PHP Session
session_start(['cookie_httponly' => true, 'cookie_secure' => true]);

// Global Requirements
require_once '../../app/inc/global.php';
useModel('database');
useModel('endpoint');
useModel('user');
useController('central');

// Route Logic
$full_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = Router::extractUri($full_uri);
$routepath = Router::routeMe($full_uri);

// Authgate
if (isset($_SESSION['TOKEN'])) {
    $token = Auth::gate($_SESSION['TOKEN']);
    $_SESSION['UUID'] = $token['uuid'];
    $_SESSION['AUTH_STATE'] = Auth::state($token);
} else {
    $_SESSION['AUTH_STATE'] = false; // Token session var not set
}

if (file_exists($routepath)) {

    require $routepath;

} else if ($uri === '') {

    require DEFAULT_ROUTE;

} else  {

    require __DIR__ . PATH_PREPEND_DIR . 'controllers/404.php';

}
?>