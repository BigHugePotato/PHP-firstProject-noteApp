<?php

namespace Core\Middleware;

class Middleware

{
    const MAP = [
        "guest" => guest::class,
        "auth" => auth::class
    ];


    public static function resolve($key){
        if (!$key){
            return;
        }

        $middleware = static::MAP[$key];

        (new $middleware)->handle();
    }
        
}
