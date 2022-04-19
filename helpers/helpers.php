<?php
function site_url($route){
return $_ENV['HOST'].$route;
}
function views($path , $data = [])
{
    extract($data);
    $path =str_ireplace('.','/',$path);
    $view_full_path=  BASEPATH . "views/$path.php";
    include_once $view_full_path;
}