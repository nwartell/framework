<?php
// Initialize PHP Session
session_start(['cookie_httponly' => true, 'cookie_secure' => true]);

// Global Requirements
require_once '../../app/config/autoload.php';

use App\Router\Router;

useModel('database');
useModel('user');
useController('central');
useService('AuthService');

// Auth state
if (isset($_SESSION['TOKEN'])) {
    $token = $_SESSION['TOKEN'];
    $_SESSION['AUTH_STATE'] = true;
    $_SESSION['UUID'] = $token['uuid'];
} else {
    $_SESSION['AUTH_STATE'] = false; // Token session var not set
}

// Route Logic
$routepath = Router::routeMe($_SERVER['REQUEST_URI']);

echo $routepath;

?>