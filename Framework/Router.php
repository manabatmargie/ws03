<?php

namespace Framework;

class Router
{
    protected $routes = [];

    public function RegisterRoute($method, $uri, $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
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
    public function error($httpCode = 404)
    {
        http_response_code($httpCode);
        loadView("error/{$httpCode}");
        exit;
    }
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if (
                $route['uri'] === $uri
                && $route['method'] === $method
            ) {
                require basePath('App/' . $route['controller']);
                return;
            }
        }

        $this->error();
    }
}
