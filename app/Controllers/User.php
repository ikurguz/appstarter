<?php

namespace App\Controllers;

class User extends BaseController
{
    private $userModel;

    public function __construct() {
        $this->userModel = new \App\Models\User();
    }
    public function register() {
        helper('form');

        $data = [
            'title' => 'Регистрация',
        ];
        return view('user/register');
    }

    public function store() {

        if ($this->validate('userRegister')) {
            if(!$this->userModel->insert($this->request->getPost())) {
                return redirect()->route('user.register')->withInput()->with('fail', 'Чет пошло не так');
            }
        } else {
            return redirect()->route('user.register')->withInput()->with('errors', $this->validator->getErrors());
        }

        return redirect()->route('user.register')->with('success', 'Ура, вы зарегистрированы');

        d($this->request->getPost());

    }
}