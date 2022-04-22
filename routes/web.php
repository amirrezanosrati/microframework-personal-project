<?php
use App\Core\routing\Route;
use App\Middleware\BlockFirefox;
use App\Middleware\BlockIE;

Route::get("/microframework.php/",'HomeController@index');
Route::get("/microframework.php/archive",'ArchiveController@index');
Route::get('/microframework.php/post/{slug}','PostController@single');
Route::get('/microframework.php/post/{slug}/comment/{cid}','PostController@comment');
Route::get("/microframework.php/todo/list",'TodoController@list',[BlockFirefox::class,BlockIE::class]);

Route::add(['get','post'],'/microframework.php/a',function(){
    echo "welcome";
});

Route::get('/microframework.php/b', function(){
    echo  "save ok";
});

Route::put('/microframework.php/c' , ['Controllers', 'Method']);
Route::get('/microframework.php/d','Controllers@Method');
