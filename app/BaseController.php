<?php

namespace cva67\phpmvc\app;


use cva67\phpmvc\Middleware;
use cva67\phpmvc\Response;

use cva67\phpmvc\View;

class BaseController
{
    protected Response $response;
    protected View $view;
    protected array $middlewares = [];
    protected array $methodMiddlewares = [];

    public function __construct()
    {
        $this->response = new Response();
        $this->view = new View();
    }

    protected function render(string $view, array|object $data = [], int $statusCode = 200)
    {
        $this->view->render($view, $data);
        $this->response->setStatusCode($statusCode);
    }

    public function registerMiddleware(Middleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }
    public function registerMethodMiddleware(Middleware $middleware, array $methods)
    {
        foreach ($methods as $method) {
            $this->methodMiddlewares[$method][] = $middleware;
        }
    }

    public function runMiddlewares($method)
    {

        foreach ($this->middlewares as $middleware) {
            return $middleware->handle();
        }
        if (isset($this->methodMiddlewares[$method])) {
            foreach ($this->methodMiddlewares[$method] as $middleware) {
                $middleware->handle();
            }
        }
    }
}
