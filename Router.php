<?php
class Router
{
    protected $routes = [];

    public function registerRoute($method, $uri, $controller)
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
}
