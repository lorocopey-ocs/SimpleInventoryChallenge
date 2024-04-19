<?php

if (!function_exists('dd')) {
    function dd($value)
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";

        die();
    }
}

if (!function_exists('view')) {
    function view($name, $data = [])
    {
        extract($data);

        return require __DIR__ . "/src/views/{$name}.view.php";
    }
}

if (!function_exists("route")) {
    function route($uri, $routes)
    {
        if (array_key_exists($uri, $routes)) {
            require $routes[$uri];
        } else {
            abort(404);
        }
    }
}

if (!function_exists("abort")) {
    function abort($code)
    {
        http_response_code($code);

        return require __DIR__ . "/src/views/{$code}.view.php";
    }
}

if (!function_exists('viewPartial')) {
    function viewPartial($name, $data = [])
    {
        extract($data);

        return require __DIR__ . "/src/views/partials/{$name}.tpl.php";
    }
}

if (!function_exists('viewComponent')) {
    function viewComponent($name, $data = [])
    {
        extract($data);

        return require __DIR__ . "/src/views/components/{$name}.tpl.php";
    }
}

if (!function_exists('viewLayout')) {
    function viewLayout($name, $data = [])
    {
        extract($data);

        return require __DIR__ . "/src/views/layouts/{$name}.tpl.php";
    }
}

if (!function_exists('viewSection')) {
    function viewSection($name)
    {
        return require __DIR__ . "/src/views/sections/{$name}.tpl.php";
    }
}

if (!function_exists('redirect')) {
    function redirect($path)
    {
        header("Location: /{$path}");
    }
}

if (!function_exists('old')) {
    function old($name)
    {
        return $_REQUEST[$name] ?? '';
    }
}

if (!function_exists('config')) {
    function config($key)
    {
        $config = require __DIR__ . "/../config/app.php";

        return $config[$key];
    }
}

if (!function_exists('asset')) {
    function asset($path)
    {
        return "/public/{$path}";
    }
}

if (!function_exists('csrf')) {
    function csrf()
    {
        return "<input type='hidden' name='csrf' value='" . $_SESSION['csrf'] . "'>";
    }
}

if (!function_exists('csrf_verify')) {
    function csrf_verify()
    {
        if ($_REQUEST['csrf'] !== $_SESSION['csrf']) {
            die("CSRF token mismatch");
        }
    }
}

if (!function_exists('urlIs')) {
    function urlIs(string $value)
    {
        return $_SERVER['REQUEST_URI'] === $value;
    }
}
