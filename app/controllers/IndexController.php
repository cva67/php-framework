<?php

namespace cva67\phpmvc\app\controllers;

use cva67\phpmvc\app\BaseController;


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
