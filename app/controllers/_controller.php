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

}

class Url {
    // URL PARAMTERS
    public static function extractParam($arg) {
        if (isset($_GET[$arg])) {
            return htmlspecialchars($_GET[$arg]);
        } else {
            return 'ERROR: Unset Parameter';
        }
    }
}

class Http {
    public static function issetPost(...$args) : bool {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false; // ERROR: Request method is not POST
        }

        foreach ($args as $arg) {
            if (!isset($_POST[$arg])) {
                return false; // ERROR: At least one POST variable is unset
            }
        }

        return true;

    }
}

class Auth {

    // Require login to view page 
    public static function require() {
        if (!$_SESSION['AUTH_STATE'] === true) {
            header('Location: signin');
        }
    }

}

class Page {
    public static function setTitle(string $page_title) {
        $site_name = SITENAME;
        $full_title = htmlspecialchars($page_title) . ' | ' . $site_name; 
        return $full_title;
    }
}

?>