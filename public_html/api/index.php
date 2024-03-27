<?php

require_once 'inc/global.php';
require_once 'models/database.php';

header("Content-Type: application/json");

$full_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace(HOST, "", $full_uri);

$require_path = __DIR__ . '/endpoints/' . $uri . '.php';

if (file_exists($require_path)) {
    require $require_path;
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Endpoint Not Found"));
}

?>