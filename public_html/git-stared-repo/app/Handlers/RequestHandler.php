<?php

namespace App\Handlers;

use App\Enums\GitEnum;

class RequestHandler {

    public function filter($request) {

        $_data = 'q=';
        foreach ($request->query() as $key => $value) {
            if(!in_array($key, GitEnum::$filters)) {
                $params = explode(':', $value);
                $_data .= $key.GitEnum::$orders[$params[0]].$params[1].' ';
            }
        }

        if($_data === 'q=') return false;

        $_data = rtrim($_data);

        foreach ($request->query() as $key => $value) {
            if(in_array($key, GitEnum::$filters)) {
                $_data .= '&'.$key.'='.$value;
            }
        }

        return str_replace(' ', '%20', $_data);
    }
}
