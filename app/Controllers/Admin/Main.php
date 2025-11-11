<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;


class Main extends BaseController
{
    public function index() {

        $data = [
            'title' => 'Админка'
        ];
        return view('admin/index', $data);
    }

    public function test() {

        $data = [
            'title' => 'Админка [test]'
        ];
        return view('admin/test', $data);
    }
}