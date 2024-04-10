<?php

require_once 'Controllers/ProductController.php';

class CorsService {

  public static function addRestHeaders() {
    header('Access-Control-Allow-Origin: *');
    header("Content-type: application/json; charset=utf-8");
  }
}

