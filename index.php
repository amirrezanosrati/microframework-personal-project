<?php



include 'bootstrap/init.php'; 

//var_dump(\App\Core\Routing\Route::routes());
$router = new \App\Core\Routing\Router();
$router->run();

