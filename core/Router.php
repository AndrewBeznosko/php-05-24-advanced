<?php

namespace Core;

use App\Enums\Http\Method;

class Router
{
    protected static Router|null $instance = null;

    protected array $routes = [];
    protected array $params = [];
    protected $currentRoute;

    static function getInstance(): Router
    {
        if (self::$instance === null) {
            self::$instance = new Router();
        }
        return self::$instance;
    }

    public function __call(string $name, array $arguments)
    {
        $methodName = 'set' . ucfirst($name);

        if (!method_exists($this, $methodName)) {
            throw new \BadMethodCallException("Method {$methodName} does not exist");
        }

        $refMethod = new \ReflectionMethod($this::class, $methodName);

        if ($refMethod->getReturnType() !== 'void') {
            throw new \BadMethodCallException("Method {$methodName} must return void");
        }
    }

    status public function put(string $uri): static
    {
        return static::setUri($uri)->setMethod('PUT');
    }

    static protected function setUri(string $uri): static
    {
        $uri = preg_replace('/\//', '\/', $uri);
        $uri = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z]+)', $uri);
        $uri = '/^' . $uri . '$/';

        $router = static::getInstance();
        $router->routes[$uri] = [
//            'uri' => $uri,
//            'method' => 'GET',
//            'controller' => null,
//            'action' => null,
        ];
        $router->currentRoute = $uri;
        return static::$instance;
    }

    protected function setController(string $controller): static
    {
        $this->routes[$this->currentRoute]['controller'] = $controller;
        return $this;
    }

    protected function setAction(string $action): static
    {
        $this->routes[$this->currentRoute]['action'] = $action;
        return $this;
    }

    protected function setMethod(Method $method): static
    {
        $this->routes[$this->currentRoute]['method'] = $method;
        return $this;
    }

    static public function dispatch()
    {
        $router = static::getInstance();

        $uri = $router->removeQueryVariables($_SERVER['REQUEST_URI']);

        dd($uri);
        return $uri;
    }

    protected function matchRoute($uri)
    {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $uri, $matches)) {
                $this->params = $params;
                return true;
            }
        }

        return false;
    }

    protected function removeQueryVariables($uri)
    {
        if ($uri !== '') {
            $uri = explode('?', $uri);
            return $uri[0];
        }

        return $uri;
    }

    protected function checkMethod($method)
    {
       $requestMethod = $_SERVER['REQUEST_METHOD'];

         if ($requestMethod !== strtolower($method)) {
            return false;
    }
}