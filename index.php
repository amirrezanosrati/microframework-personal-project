<?php



include 'bootstrap/init.php';


/*$route = '/microframework.php/post/{slug}';
$pattern="/^".str_replace(['/','{','}'],['\/','(?<','>[-%\w]+)'],$route)."$/";

var_dump($route);
var_dump($pattern);
$route_pattern='/^\/microframework.php\/post\/(?<slug>[-%\w]+)$/';
var_dump($route_pattern);*/



//var_dump(\App\Core\Routing\Route::routes());

$router = new \App\Core\Routing\Router();
$router->run();

/**$route = 'microframework.php/post/{slug}';
$route_pattern='/^\/microframework.php\/post\/(?<slug>[-%\w]+)$/';

$uri1='/microframework.php/post/what-is-php';
$uri2='microframework.php/post/why-you-must-choose-7Learn';
$uri3='/posasda/why-you-must-choose-7Learn';

$result=preg_match($route_pattern,$uri1,$matches);
var_dump($result);
var_dump($matches);*/
