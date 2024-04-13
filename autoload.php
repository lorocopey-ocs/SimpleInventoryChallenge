<?php

spl_autoload_register(function ($clase){
    $route = '../'.str_replace("\\", "/", $clase).".php";

    if (file_exists($route)){
        require_once $route;
    } else {
        die("Can't load the class: $clase");
    }
});
