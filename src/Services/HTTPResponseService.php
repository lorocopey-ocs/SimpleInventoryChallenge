<?php

require_once 'Enums/HTTPEnums.php';
require_once 'Services/CorsService.php';

class HTTPResponseService {

    public static function BadRequest(string $message){

        CorsService::addRestHeaders();
        HTTPEnums::HTTPBadRequest();
        echo json_encode(["message" => $message]);
    }

    public static function OK(array $data){

        CorsService::addRestHeaders();
        HTTPEnums::HTTPOK();
        echo json_encode($data);
    }

    public static function InternalServerError(\Exception $e){
        CorsService::addRestHeaders();
        HTTPEnums::HTTPInternalServerError();
        echo json_encode(["message" => $e->getMessage()]);
    }

    public static function NotFound(string $message){
        CorsService::addRestHeaders();
        HTTPEnums::HTTPNotFound();
        echo json_encode(["message" => $message]);
    }

}
