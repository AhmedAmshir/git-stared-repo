<?php

namespace App\Enums;

class GitEnum {

    public static $default_user_agent = "Mozilla/5.0";
    
    public static $orders = [
        'e' => ':',
        'gt' => ':>',
        'gte' => ':>=',
        'lte' => ':<=',
        'lt' => ':<',
    ];
    
    public static $filters = ['sort', 'order', 'per_page', 'page'];
}
