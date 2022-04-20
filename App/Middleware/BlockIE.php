<?php

namespace App\Middleware;

use App\Middleware\Contrant\MiddlewareInterface;
use hisorange\BrowserDetect\Parser as Browser;
class BlockIE implements MiddlewareInterface{
    public function handle(){
        global $request;
        echo 'block IE test';
        if (Browser::isIE()) {
        die('IE is blocked !!');
        }
        
    }
}