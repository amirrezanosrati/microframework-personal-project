<?php

namespace App\Core\Routing;
use App\middleware;
use \App\Core\Request;
use Exception;

class Router
{
    private $request;
    private $routes;
    private $current_route;
    const BASE_CONTROLLER = '\App\Controllers\\';

    public function __construct()
    {
        $this->request = new Request();
        $this->routes = Route::routes();
        $this->current_route = $this->findRoute($this->request) ?? null;
        $this->run_route_middalerware();
       //  var_dump($this->current_route);
    }
    private function run_route_middalerware()
    {
        $middleware = $this->current_route['middleware'];
        if (!empty($middleware)) {
        foreach ($middleware as $middleware_class) {
            $middleware_obj = new $middleware_class;
             $middleware_obj->handle();
             die();
         }
        }
    }
    public function findRoute(Request $request)
    {
        //echo $request->method() . "" . $request->uri();
        foreach ($this->routes as $route) {
            if (!in_array($request->methode(), $route['methodes'])) {
                return false;
            }
            if ($this->regex_matched($route)) {
                return $route;
            }
        }
        return null;
    }
    public function regex_matched($route){
        global $request;
        $pattern="/^".str_replace(['/','{','}'],['\/','(?<','>[-%\w]+)'],$route['uri'])."$/";
        $result=preg_match($pattern,$this->request->uri(),$matches);
        if (!$result) {
            return false;
        }
        foreach($matches as $key => $value){
            if (!is_int($key)) {
                $request->add_route_param($key,$value);
            }
        }
        return true;
    }

    public function dispatch404()
    {
        header("HTTP/1.0 404 Not Found");
        views('errors.404');
        die();
    }


    public function run()
    {
        if (is_null($this->current_route))
            $this->dispatch404();

        $this->dispatch($this->current_route);
    }
    private function dispatch($route)
    {

        $action = $route['action'];
        if (is_null($action) || empty($action)) {
            return;
        }
        if (is_callable($action))
            call_user_func($action);

        if (is_string($action))
            $action = explode('@', $action);

        if (is_array($action)) {
            $class_name = self::BASE_CONTROLLER . $action[0];
            $methode = $action[1];
            if (!class_exists($class_name))
                throw new \Exception('class name error');

            $controller = new $class_name();
            if (!method_exists($controller, $methode))
                throw new \Exception('method not exist');
            $controller->{$methode}();
        }
    }
}
