<?php


if (!function_exists('dd')) {
    function dd($value): void
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";

        die();
    }
}

if (!function_exists('base_path')) {
    function base_path(string $path): string
    {
        return BASE_PATH . $path;
    }
}

if (!function_exists('view')) {
    function view($name, $data = [])
    {
        extract($data);

        return require base_path("/views/{$name}.view.php");
    }
}

if (!function_exists("route")) {
    function route($uri, $routes): void
    {
        if (array_key_exists($uri, $routes)) {
            require base_path($routes[$uri]);
        } else {
            abort(404);
        }
    }
}

if (!function_exists("abort")) {
    function abort($code)
    {
        http_response_code($code);

        return require base_path("/views/{$code}.view.php");
    }
}


if (!function_exists('redirect')) {
    function redirect($path): void
    {
        header("Location: " . $path);
    }
}

if (!function_exists('old')) {
    function old($name)
    {
        return $_REQUEST[$name] ?? '';
    }
}

if (!function_exists('get_data')) {
    function data_get(array $data, string $key)
    {
        return $data[$key] ?? '';
    }
}
