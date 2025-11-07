<?php


namespace App\Controllers;


class Main extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Главная страница',
            'page_title' => 'Добро пожаловать!',
        ];

        return view('main/index', $data);
    }
}
