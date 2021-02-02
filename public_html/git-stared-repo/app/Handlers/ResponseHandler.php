<?php

namespace App\Handlers;

use App\Enums\ResponseEnum;
use Illuminate\Http\Response;

class ResponseHandler {

    protected $data;
    
    public function __construct() {
        $this->data = [];
    }

    public function addParameter($value){
        if (isset($value) && !empty($value)){
            $this->data = $value;
        }
    }

    public function ok($message = NULL){
        return $this->createResponse(ResponseEnum::$statusCodes['OK']['id'], $message);
    }

    public function badRequest($message = NULL){
        return $this->createResponse(ResponseEnum::$statusCodes['UnprocessableEntity']['id'], $message);
    }

    private function createResponse($status_code, $message) {
        if (isset($status_code) && !empty($status_code)){
            $response['status_code'] = $status_code;
        } else {
            $status_code = ResponseEnum::$statusCodes['OK']['id'];
        }
        if (isset($message) && !empty($message)){
            $response['message'] = $message;
        }
        $response['data'] = $this->data;
        $this->data = json_encode($response);
        return new Response(
            $this->data,
            $status_code,
            ['Content-Type' => 'application/json']
        );
    }
}
