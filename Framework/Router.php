<?php

namespace Framework;

use App\Controllers\ErrorController;

class Router
{
    protected $routes = [];

    public function RegisterRoute($method, $uri, $action)
    {
        list($controller, $controllerMethod) = explode('@', $action);
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod
        ];
    }

    public function get($uri, $controller)
    {
        $this->RegisterRoute('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        $this->RegisterRoute('POST', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        $this->RegisterRoute('PUT', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        $this->RegisterRoute('DELETE', $uri, $controller);
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if (
                $route['uri'] === $uri
                && $route['method'] === $method
            ) {
                //Extract controller and controller method
                $controller = 'App\\Controllers\\' . $route['controller'];
                $controllerMethod = $route['controllerMethod'];

                //Instantiate controller class
                $controllerInstance = new $controller();
                $controllerInstance->$controllerMethod();
                return;
            }
        }

        ErrorController::notFound();
    }
}
