<?php

namespace App\Controllers;

class Controller
{
    public function view(string $route, array $params = [])
    {
        extract($params, EXTR_OVERWRITE);
        $route = str_replace('.','/', $route);
        $path = "../resources/views/{$route}.php";
        if (file_exists($path)){
            ob_start();
            include $path;
            return ob_get_clean();
        }

        return "File not exist";
    }

    public function redirect(string $route): void
    {
        header("Location: {$route}");
    }
}
