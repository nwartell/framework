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

class API {
    public static function requireKey() {

        if(!isset($_GET['key'])) {

            echo json_encode(array("error"=>"An API key is required to access this endpoint."));
            exit();

        } else {

            try {

                $pdo = pdo_open();

                $apikey = htmlspecialchars($_GET['key']);

                $stmt = $pdo->prepare("SELECT * FROM api_keyvault WHERE apikey = UNHEX(REPLACE(?,'-',''))");
                $stmt->bindValue(1, $apikey);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    return true;
                } else {
                    echo json_encode(array("error"=>"Invalid API key."));
                    exit();
                }

            } catch (PDOException $e) {
                echo json_encode(array("error"=>$e->getMessage()));
            } finally {
                pdo_close($pdo);
            }

        }
    }
}

?>