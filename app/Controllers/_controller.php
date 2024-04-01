<?php

abstract class _Controller {

    protected function render($template_array = [], $data = []) {

        extract($data);

        foreach ($template_array as $template_name) {
            $template_file = PATH_PREPEND.'templates/'.$template_name.'.php';
            if (!file_exists($viewFile)) {
                throw new Exception("View file '$template_name' not found.");
            }
            require $template_file;
        }

    } // Eventually replace templating

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