<?php

namespace App\Controllers;

class User extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new \App\Models\User();
    }

    public function register()
    {
        if (session()->has('name')) {
            return redirect('admin.main');
        }
        helper('form');

        $data = [
            'title' => 'Регистрация',
        ];
        return view('user/register');
    }

    public function store()
    {
        if (session()->has('name')) {
            return redirect('admin.main');
        }
        if ($this->validate('userRegister')) {
            if (!$this->userModel->insert($this->request->getPost())) {
                return redirect()->route('user.register')->withInput()->with('fail', 'Чет пошло не так');
            }
        } else {
            return redirect()->route('user.register')->withInput()->with('errors', $this->validator->getErrors());
        }

        return redirect()->route('user.register')->with('success', 'Ура, вы зарегистрированы');

//        d($this->request->getPost());

    }

    public function auth()
    {
        if (session()->has('name')) {
            return redirect('admin.main');
        }
        helper('form');

        if ($this->request->getMethod() == 'POST') {
//          1 что делаем это проводим валидацию данных
            if (!$this->validate('userLogin')) {
                return redirect()->route('user.auth')->with('errors', $this->validator->getErrors());
            } else {
//              2 - получаем объект модели user по email
                $user = $this->userModel->where('email', $this->request->getPost('email'))->first();

//              3 - check password
                if (!$user || !$this->checkPassword($this->request->getPost('password'), $user['password'])) {
                    return redirect()->route('user.auth')->withInput()->with('fail', 'Некорректный email или пароль');
                }


//    4 - если прошли валидацию
                $this->setProfile($user);
                return redirect()->route('admin.main')->with('success', 'Ура, вы успешно вошли в личный кабинет');
            }
        }

        $data = [
            'title' => 'Вход в личный кабинет',
        ];
        return view('user/auth', $data);
    }

    private function checkPassword($data_password, $user_password)
    {
        return password_verify($data_password, $user_password);
    }

    private function setProfile($user)
    {
        $user_data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
        ];

        session()->set($user_data);
    }

    public function logout()
    {
        if (session()->has('name')) {
            session()->destroy();
        }
        return redirect()->route('user.auth');
    }
}