<?php

namespace App\Middleware;

use App\Middleware\Contrant\MiddlewareInterface;

class BlockIE implements MiddlewareInterface{
    public function handle(){
        global $request;
        echo('block IE').'<br>';
    }
}