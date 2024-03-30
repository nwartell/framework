<?php

namespace App\Router;

class Router {

    // Main route function
    public static function routeMe($request) {
        $full_uri = parse_url($request, PHP_URL_PATH);
        $uri = self::extractUri($full_uri);

        $routeConfig = require __DIR__ . '/routeconfig.php';

        if (isset($routeConfig[$uri])) {

            $route = $routeConfig[$uri];
            $middleware_array = $route['middleware'];
            $controller = $route['controller'];

            if (empty($middleware_array)) {
                self::callControler($controller);
            } else {

                // Handle Middleware layer
                for ($i = 0; $i < count($middleware_array); $i++) {
                    $middleware = 'App\Middleware\\'.$middleware_array[$i];
                    $middlewareObj = new $middleware;
                    $middlewareObj->handle($request);
                }

                // Finally, call controller
                self::callControler($controller);
                
            }

        } else {

            $routepath = __DIR__ . PATH_PREPEND_DIR . 'Controllers/' . $uri . '.php';

            if (file_exists($routepath)) {
                require $routepath;
            } else {
                require __DIR__ . PATH_PREPEND_DIR . 'controllers/404.php';
            }

        }
    }

    public static function callControler($controller) {
        $routepath = __DIR__ . PATH_PREPEND_DIR . 'Controllers/' . $controller . '.php';
        require $routepath;
    }

    // URI
    public static function extractUri($full_uri) {
        $uri = str_replace(PUBLIC_DIR, '', $full_uri);
        $uri = str_replace('.php', '', $uri);
        return $uri;
    }

}

?>