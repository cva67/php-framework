<?php

namespace cva67\phpmvc\routes;

use cva67\phpmvc\app\controllers\AuthController;
use cva67\phpmvc\app\controllers\BlogController;
use cva67\phpmvc\app\controllers\IndexController;

// $router->get('/', function () {
//     return 'hello';
// });

$router->get('/', [IndexController::class, 'index']);
$router->get('/home', [IndexController::class, 'index']);
$router->get('/contact', [IndexController::class, 'contact']);

$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/register', [AuthController::class, 'register']);
$router->post('/register', [AuthController::class, 'register']);
$router->get('/logout', [AuthController::class, 'logout']);
$router->get('/profile', [AuthController::class, 'profile']);

$router->get('/blogs', [BlogController::class, 'index']);
$router->get('/blog/{id}', [BlogController::class, 'view']);
$router->get('/blog/{id}/edit', [BlogController::class, 'edit']);
