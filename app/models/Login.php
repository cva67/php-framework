<?php

namespace MyApp\app\models;

use MyApp\app\BaseModel;
use cva67\phpmvc\App;

class Login extends BaseModel
{


    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' =>  ['required', 'email'],
            'password' =>  ['required'],
        ];
    }

    public function login()
    {
        $user = new User();
        $u = $user->findOne(['email' => $this->email]);
        if (!$u) {
            return $this->addCustomError('email', 'Email doesnot exits');
        } else {
            if (password_verify($this->password, $u['password'])) {
                unset($u['password']);
                App::$app->session->setSession('user', $u);
                return $user;
            } else {
                return $this->addCustomError('password', 'Password doesnot match');;
            }
        }
    }
}
