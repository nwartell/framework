<?php

function pdo_open() {
    $pdo = new PDO(
        'mysql:host='.$_ENV['APP_DB_HOST'].';dbname='.$_ENV['APP_DB_NAME'],
        $_ENV['APP_DB_USER'],
        $_ENV['APP_DB_PASS']
    );
    return $pdo;
}

function pdo_close(&$pdo) {
    $pdo = null;
}

?>