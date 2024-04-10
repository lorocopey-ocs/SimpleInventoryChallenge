<?php

class HTTPEnums {

    public static function HTTPOK(){
        header("HTTP/1.1 200 OK");
    }

    public static function HTTPBadRequest(){
        header("HTTP/1.1 400 Bad Request");
    }

    public static function HTTPNotFound(){
        header("HTTP/1.1 404 Not Found");
    }

    public static function HTTPInternalServerError(){
        header("HTTP/1.1 500 Internal Server Error");
    }

}