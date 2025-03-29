<?php

namespace MyApp\app\controllers;

use MyApp\app\BaseController;
use MyApp\app\middlewares\AuthMiddleware;
use cva67\phpmvc\Request;

class BlogController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->registerMiddleware(new AuthMiddleware());
    }
    public function index()
    {
        $this->render('blogs/blogs');
    }

    public function view(Request $request, array $params)
    {

        $this->render('blogs/blog', $params);
    }

    public function edit(Request $request, array $params)
    {

        $this->render('blogs/edit', $params);
    }
}
