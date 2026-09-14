<?php

class Router {
    protected $routes = [];

    public function get($uri, $controller) {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller) {
        $this->routes['POST'][$uri] = $controller;
    }

    public function route($uri, $method) {
        $uri = rtrim($uri, '/');
        if (empty($uri)) {
            $uri = '/';
        }

        if (array_key_exists($method, $this->routes) && array_key_exists($uri, $this->routes[$method])) {
            $controller = $this->routes[$method][$uri];
            
            // Si c'est une fonction anonyme (Closure), on l'exécute directement
            if ($controller instanceof Closure) {
                return $controller();
            }
            
            // Sinon, c'est un tableau [Classe, Méthode]
            [$class, $action] = $controller;
            
            if (class_exists($class)) {
                $controllerInstance = new $class();
                if (method_exists($controllerInstance, $action)) {
                    return $controllerInstance->$action();
                }
            }
        }

        http_response_code(404);
        echo "404 - Page non trouvée";
    }
}