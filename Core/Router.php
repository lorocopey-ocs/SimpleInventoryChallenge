<?php

namespace Core;

class Router {
    public array $routes = [];

    public function get(string $uri, $controller): void
    {
        $this->add($uri, $controller, 'GET');
    }

    public function post(string $uri, $controller): void
    {
        $this->add($uri, $controller, 'POST');

    }

    public function put(string $uri, $controller): void
    {
        $this->add($uri, $controller, 'PUT');

    }

    public function patch(string $uri, $controller): void
    {
        $this->add($uri, $controller, 'PATCH');

    }

    public function delete(string $uri, $controller): void
    {
        $this->add($uri, $controller, 'DELETE');

    }

    public function route(string $uri, string $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path("Http/controllers/{$route['controller']}.php");
            }
        }

        return abort(404);
    }

    private function add(string $uri, $controller, string $method): void
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
        ];
    }
}
