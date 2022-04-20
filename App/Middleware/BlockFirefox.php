<?php
namespace App\Middleware;
use App\Middleware\Contrant\MiddlewareInterface;
use hisorange\BrowserDetect\Parser as Browser;

class BlockFirefox implements MiddlewareInterface{
    public function handle(){
        echo 'block IE test';
        if (Browser::isIE()) {
            die('IE is blocked !!');
            }
        
    }
}