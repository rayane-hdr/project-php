<?php
namespace App;

class Router
{
    private $routes = [];

    public function addRoute($path, $handler)
    {
        $this->routes[$path] = $handler;
    }

    public function dispatch($requestUri)
    {
        // Normaliser le chemin demandé
        $requestUri = rtrim($requestUri, '/');
        echo "Requested URI: " . $requestUri . "<br>";

        foreach ($this->routes as $path => $handler) {
            echo "Checking route: " . $path . "<br>";
            if ($requestUri === $path) {
                return call_user_func($handler);
            }
        }
        // Si la route n'existe pas, renvoyer une page 404
        http_response_code(404);
        echo "404 Page Not Found";
    }


}
