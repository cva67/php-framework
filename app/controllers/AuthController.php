<?php

namespace cva67\phpmvc\controllers;

use cva67\phpmvc\BaseController;
use cva67\phpmvc\middlewares\AuthMiddleware;
use cva67\phpmvc\models\Login;
use cva67\phpmvc\models\User;
use cva67\phpmvc\App;
use cva67\phpmvc\exceptions\Forbidden;
use cva67\phpmvc\Request;

class AuthController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->registerMethodMiddleware(new AuthMiddleware(), ['profile']);
    }

    public function login(Request $request)
    {

        if (App::$app->session->existsSession('user') === false) {
            $login  = new Login();
            if ($request->isPost()) {
                $login->load($request->getAll());
                if ($login->validate() && $login->login()) {

                    $this->response->redirect('/home');
                } else {
                    $this->render('auth/login', ['login' => $login]);
                }
            } else {
                $this->render('auth/login', ['login' => $login]);
            }
        } else {
            $this->response->redirect('/home');
        }
    }

    public function register(Request $request)
    {
        $user = new User();

        if ($request->isPost()) {
            $data = $user->load($request->getAll());
            if ($user->validate() && $user->save()) {

                //database error should be handle like unique email error
                App::$app->session->setFlash('success', 'You have successfully created user!', 'success');
                $this->response->redirect('/login');
            } else {
                $this->render('auth/register', ['user' => $user]);
            }
        } else {
            $this->render('auth/register', ['user' => $user]);
        }
    }

    public function logout()
    {
        if (App::$app->session->existsSession('user')) {
            App::$app->session->destorySession();
        }
        $this->response->redirect('/home');
    }
    public function profile()
    {
        $this->render('auth/profile');
    }
}
