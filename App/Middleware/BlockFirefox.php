<?php
namespace App\Middleware;

use App\Middleware\Contrant\MiddlewareInterface;

class BlockFirefox implements MiddlewareInterface{
    public function handle(){
        global $request;
        echo('block Firefox').'<br>'; 
    }
}