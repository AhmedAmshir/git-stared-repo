<?php

namespace App\Enums;

class ResponseEnum {

    public static $statusCodes = [
        'OK' => ['id' => 200],
        'ServerError' => ['id' => 500],
        'UnprocessableEntity' => ['id' => 422]
    ];
}
