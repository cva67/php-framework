<?php

namespace MyApp\app\models;

use MyApp\app\BaseModel;

class User extends BaseModel
{
    protected string $table = 'users';

    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $confirm_password = '';
    public string $address = '';


    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' =>  ['required', 'email'],
            'password' =>  ['required', 'max:8', 'min:3'],
            'confirm_password' => ['required', 'match:password'],
            'address' => ['required'],
        ];
    }
    public function save()
    {
        $this->data = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => password_hash($this->password, PASSWORD_DEFAULT),
            'address' => $this->address
        ];
        return parent::save();
    }
}
