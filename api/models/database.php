<?php

function pdo_open() {
    $pdo = new PDO(
        'mysql:host='.$_ENV['API_DB_HOST'].';dbname='.$_ENV['API_DB_NAME'],
        $_ENV['API_DB_USER'],
        $_ENV['API_DB_PASS']
    );
    return $pdo;
}

function pdo_close(&$pdo) {
    $pdo = null;
}

?>