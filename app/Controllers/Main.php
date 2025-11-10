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
        $res = $this->db->select('city.*, country.Name AS country_name, city.Population AS city_population')
            ->join('country', 'city.CountryCode = country.Code', 'left')
            ->orderBy('city_population DESC')
            ->findAll(10);
        d($res);
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
}
