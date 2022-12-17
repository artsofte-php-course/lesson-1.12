<?php

namespace Http;

class Router {

    protected $routes;

    public function __construct($routes) 
    {
        $this->routes = $routes;
    }

    public function match (Request $request) {
            
        foreach ($this->routes as $route) {
            if ($route['method'] === $request->getMethod()
                && $route['path'] === $request->getPath()
            ) {
                $controller = $route['controller'];
                $action = $route['action'];
            } 
        }

        return [
            'controller' => $controller,
            'action' => $action
        ];
    }
}