<?php
// Initialize PHP Session
session_start();

// Global Requirements
require_once '../../app/inc/global.php';
useModel('database');
useModel('user');
useController('central');

// Route Logic
$full_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = extract_uri($full_uri);
$routepath = routeme($full_uri);

// Authgate
if (isset($_SESSION['TOKEN'])) {
    $token = authGate($_SESSION['TOKEN']);
    $_SESSION['AUTH_STATE'] = authState($token);
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