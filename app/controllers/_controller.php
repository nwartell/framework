<?php

abstract class Controller {
    
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

class Page {
    public static function setTitle(string $page_title) {
        $site_name = SITENAME;
        $full_title = htmlspecialchars($page_title) . ' | ' . $site_name; 
        return $full_title;
    }
}

?>