<?php

namespace MyApp\app\controllers;

use MyApp\app\BaseController;
use cva67\phpmvc\View;

class IndexController extends BaseController
{

    public  function index()
    {
        $data = ['name' => 'shiva'];
        $this->render('home', $data);
    }

    public  function contact()
    {
        $this->render('contact');
    }
}
