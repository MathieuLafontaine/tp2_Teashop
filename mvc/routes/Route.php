<?php

namespace App\Routes;

class Route
{
    //propriete statique qui contient toutes les routes enregistrees
    private static $routes = [];

    //permet l'enregistrement de nouvelles routes get et post respectivement
    public static function get($url, $controller)
    {
        self::$routes[] = ['url' => $url, 'controller' => $controller, 'method' => 'GET'];
    }

    public static function post($url, $controller)
    {
        self::$routes[] = ['url' => $url, 'controller' => $controller, 'method' => 'POST'];
    }

    public static function dispatch()
    {
        //permet l'extraction de l'url et method (post/get)
        $url = $_SERVER['REQUEST_URI'];
        $urlSegments = explode('?', $url);
        $urlPath = rtrim($urlSegments[0], '/');

        //Fix trouve sur stackoverflow car tout me donnait un 404 error
        if ($urlPath === BASE) {
            $urlPath = BASE;
        }
        $method = $_SERVER['REQUEST_METHOD'];
        /*         echo "<pre>";
        echo "REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "\n";
        echo "BASE: " . BASE . "\n";
        foreach (self::$routes as $route) {
            echo "Testing: " . BASE . $route['url'] . "\n";
        }
        echo "</pre>"; */
        //Loop au travers des routes enregistrees
        foreach (self::$routes as $route) {

            if (BASE . $route['url'] == $urlPath && $route['method'] == $method) {
                $controllerSegments = explode('@', $route['controller']);

                //Le controller qui est appeler
                $controllerName = 'App\\Controllers\\' . $controllerSegments[0];
                //La methode post ou get
                $methodName = $controllerSegments[1];
                $controllerInstance = new $controllerName;

                if ($method == 'GET') {
                    if (isset($urlSegments[1])) {
                        parse_str($urlSegments[1], $queryParams);
                        $controllerInstance->$methodName($queryParams);
                    } else {
                        $controllerInstance->$methodName();
                    }
                } elseif ($method == 'POST') {
                    if (isset($urlSegments[1])) {
                        parse_str($urlSegments[1], $queryParams);
                        $controllerInstance->$methodName($_POST, $queryParams);
                    } else {
                        $controllerInstance->$methodName($_POST);
                    }
                }

                return;
            }
        }
        http_response_code(404);
        echo "404 page not found!!";
    }
}
