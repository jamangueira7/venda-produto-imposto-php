<?php

namespace app\core;

use app\core\exceptions\NotFoundException;

class Router
{

    public Request $request;
    public Response $response;
    protected array $routes = [];
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();

        $path_parts = explode("/", $path);
        if(is_numeric($path_parts[2]) && count($path_parts) === 3) {
            $new_url = "/$path_parts[1]/" .'$id';
            $callback = $this->routes[$method][$new_url] ?? false;
            $this->request->id = $path_parts[2];
        } else {
            $callback = $this->routes[$method][$path] ?? false;
        }

        if($callback === false) {
            throw new NotFoundException();
        }

        if (is_string($callback)) {
            return Application::$app->view->renderView($callback);
        }

        if (is_array($callback)) {
            /** @var \app\core\Controller $controller */
            $controller = new $callback[0]();
            Application::$app->controller = $controller;
            Application::$app->controller->action = $callback[1];
            $callback[0] = $controller;

            foreach ($controller->getMiddlewares() as $middleware) {
                $middleware->execute();

            }
        }

        return call_user_func($callback, $this->request, $this->response);
    }
}