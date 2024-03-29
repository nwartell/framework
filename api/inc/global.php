<?php

// Composer Autoloader
require_once __DIR__ . '/../../vendor/autoload.php';

// .env support
$dotenvPath = __DIR__ . '/../../';
$dotenv = Dotenv\Dotenv::createImmutable($dotenvPath);
$dotenv->load();

const HOST = '/api/';

?>