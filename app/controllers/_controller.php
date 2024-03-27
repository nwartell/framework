<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Router {

    // URI
    public static function extractUri($full_uri) {
        $uri = str_replace(PUBLIC_DIR, '', $full_uri);
        $uri = str_replace('.php', '', $uri);
        return $uri;
    }

    public static function routeMe($full_uri) {
        $uri = self::extractUri($full_uri);

        return $routepath = __DIR__ . PATH_PREPEND_DIR . 'controllers/' . $uri . '.php';
    }

    // URL PARAMTERS
    public static function extractParam($arg) {
        if (isset($_GET[$arg])) {
            return $_GET[$arg];
        } else {
            return 'ERROR: Unset Parameter.';
        }
    }

}

// HEADERS
function setTitle(string $page_title) {
    $site_name = 'Framework PHP';
    $full_title = htmlspecialchars($page_title) . ' | ' . $site_name; 
    return $full_title;
}

class Auth {

    // ACCESS CONTROL
    public static function gate($token) {
        try {

            if (empty($token)) {
                echo '[AUTHGATE] ERROR: Token is empty';
                return false;
            } else {

                //$jwtDecoded = JWT::decode($token, $_ENV['APP_JWT'], 'HS256'); // Old usage
                $jwtDecoded = JWT::decode($token, new Key($_ENV['APP_JWT'], 'HS256')); // New usage
            
                $iat = $jwtDecoded->iat;
                $iss = $jwtDecoded->iss;
                $nbf = $jwtDecoded->nbf;
                $exp = $jwtDecoded->exp;
                $uuid = $jwtDecoded->uuid;
                $username = $jwtDecoded->username;

                return array(
                    'iat' => $iat,
                    'iss' => $iss,
                    'nbf' => $nbf,
                    'exp' => $exp,
                    'uuid' => $uuid,
                    'username' => $username
                );

            }
            
        } catch (Exception $e) {
            echo '[AUTHGATE] ERROR: Token verification failed';
            return 0;
        }
    }

    public static function state($decodedToken) : bool {
        if (is_array($decodedToken)) {
            return true;
        } else if ($decodedToken === false) {
            return false; // Token was empty
        } else if ($decodedToken === 0) {
            return false; // Token verification failed
        }
    }

    public static function require() {
        if ($_SESSION['AUTH_STATE'] === false) {
            header('Location: signin');
        }
    }

}

?>