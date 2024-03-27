<?php

require_once '../../api/inc/global.php';
require_once '../../api/models/database.php';

header("Content-Type: application/json");

$full_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace(HOST, "", $full_uri);

$require_path = __DIR__ . '/../../api/endpoints/' . $uri . '.php';

if ($uri === '') {
    require '../../api/endpoints/index.php';
} else if (file_exists($require_path)) {
    require $require_path;
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Endpoint Not Found"));
}

?>