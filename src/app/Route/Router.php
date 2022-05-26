<?php


namespace App\Route;

use App\Exceptions\RouteNotFound;


class Router {

    private array $routes;

    public function register(string $request_method, string $route, callable|array $action): self {

        $this->routes[$request_method][$route] = $action;

        return $this;
    }

    public function get(string $route, callable|array $action): self {

        return $this->register('GET', $route, $action);

    }

    public function post(string $route, callable|array $action): self {

        return $this->register('POST', $route, $action);

    }

    public function routes(): array {
        return $this->routes;
    }

    public function resolve(string $request_uri, string $request_method) {

        $route = explode('?', $request_uri)[0];
        $action = $this->routes[$request_method][$route] ?? null;

        if (!$action) {
            throw new RouteNotFound();
        }

        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (is_array($action)) {

            [$class, $method] = $action;
            if (class_exists($class)) {
                $class = new $class;

                if (method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
            }
        }
        throw new RouteNotFound();
    }
}