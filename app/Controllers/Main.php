<?php


namespace App\Controllers;

use App\Models\CountryModel;
use Config\Database;


class Main extends BaseController
{
    private $db;

    public function __construct()
    {
        // $this->db = \Config\Database::connect();
        // $this->db = db_connect('tests');
       $this->db = new CountryModel();
    }

    public function index()
    {
//        $res = $this->db->select('city.*, country.Name AS country_name, city.Population AS city_population')
//            ->join('country', 'city.CountryCode = country.Code', 'left')
//            ->orderBy('city_population DESC')
//            ->findAll(10);
//        d($res);
//        $result = $this->db->table('city')
//            ->select('city.*, country.Name AS country_name, city.Population AS city_population')
//            ->join('country', 'city.CountryCode = country.Code', 'left')
//            ->orderBy('city_population DESC')
//            // ->where('code >', 'B')
//            ->get(10)
//            ->getResultArray();
//
//        d($result);

        $data = [
            'title' => 'Главная страница',
            'page_title' => 'Добро пожаловать!',
        ];

        return view('main/index', $data);
    }
    public function test()
    {
        helper('form');
        $data = [
            'title' => 'Test form',
            'page_title' => 'Test form!',
        ];

        $rules = [
            'name' => 'required|min_length[3]|max_length[20]',
            'email' => 'valid_email',
        ];
        if ($this->request->getMethod() == 'POST') {
            if (!$this->validate($rules)) {
//                с помощью метода with мы во флеш данные записываем сообщение об ошибке
                return redirect()->route('main.test')->withInput()->with('errors', $this->validator);
            } else {
                return redirect()->route('main.test')->with('success', 'Форма успешно отправлена!');
            }
        }



        return view('main/test', $data);
    }
}
