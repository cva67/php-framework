<?php

namespace cva67\phpmvc\app\middlewares;

use cva67\phpmvc\App;
use cva67\phpmvc\exceptions\Forbidden;
use cva67\phpmvc\Middleware;

class AuthMiddleware extends Middleware
{
    public function handle()
    {

        if (!App::$app->session->existsSession('user')) {
            throw new Forbidden();
        }
        return true;
    }
}
