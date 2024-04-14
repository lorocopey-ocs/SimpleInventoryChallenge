<?php
namespace Libs;

class Route
{
    private static array $routes = [];

    public static function get($uri, $callback)
    {
        $uri = trim($uri, '/');
        self::$routes['GET'][$uri] = $callback;
    }

    public static function post($uri, $callback)
    {
        $uri = trim($uri, '/');
        self::$routes['POST'][$uri] = $callback;
    }

    public static function dispatch()
    {
        $query = $_SERVER['QUERY_STRING'];
        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri,'/');
        $uri = str_replace('?'.$query, '', $uri);
        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes[$method] as $route => $callback){
            $route = str_replace($query, '', $route);

            if (str_contains($route, ":")) $route = preg_replace('#:[a-zA-Z0-9]+#', '([a-zA-Z0-9]+)', $route);

            if (preg_match("#^$route$#", $uri, $matches)) {
                $params = array_slice($matches, 1);

                if (!empty($query)){
                    parse_str($query, $output);
                    $params[] = $output;
                }

                if (is_callable($callback)){
                    $response = $callback(...$params);
                }

                if (is_array($callback)) {
                    $controller = new $callback[0];
                    $response = $controller->{$callback[1]}(...$params);
                }

                if (is_array($response) || is_object($response)) {
                    header('Content-type: application/json');
                    echo json_encode($response);
                } else {
                    echo $response;
                }

                return;
            }
        }
         echo '404 Not Found';
    }
}
