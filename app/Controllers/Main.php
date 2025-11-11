<?php


namespace App\Controllers;

use App\Models\CountryModel;
use App\Models\TestModel;
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


        $session = session();
//        $newdata = [
//            'email' => 'test@test.com',
//            'username' => 'test',
//            'logged_in' => TRUE,
//        ];
//        $session->set($newdata);

//        $session->push('user_group', ['title' => 'admin']);

        // Очистить сессию
        // $session->destroy();

        $cart = [
            [
                'title' => 'Product 1',
                'price' => 100,
                'qty' => 2
            ],
            [
                'title' => 'Product 2',
                'price' => 200,
                'qty' => 3
            ],
            [
                'title' => 'Product 3',
                'price' => 300,
                'qty' => 4
            ]
        ];

//        $session->set('cart', $cart);
//        Таким способом можно добавить значения в сессию
//        $session->push('cart', [
//            [
//                'title' => 'Product 4',
//                'price' => 400,
//                'qty' => 10
//            ]
//        ]);
        $s_cart = session('cart');
        unset($s_cart[0]);
        session()->set('cart', $s_cart);
//        d($session->get('cart'));


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


    public function test2()
    {
        helper('form');


        $data = [
            'title' => 'Test form 2',
            'page_title' => 'Test form 2',
        ];


        if ($this->request->getMethod() == 'POST') {
            $testModel = new TestModel();
            if (!$testModel->insert($this->request->getPost())) {
                return redirect()->route('main.test2')->withInput()->with('errors', $testModel->errors());
            } else {
                return redirect()->route('main.test2')->with('success', 'Форма успешно отправлена!');
            }
        }

        return view('main/test2', $data);
    }

    public function fileUpload()
    {
        helper('form');

        $data = [
            'title' => 'File Upload [title]',
            'page_title' => 'File Upload!',
        ];


        if ($this->request->getMethod() == 'POST') {
            $file = $this->request->getFile('userfile');
//            Если файл загружен и находится на сервере (во временной папке)
            if ($file->isValid() && !$file->hasMoved()) {
//                сохранит в папку writable/uploads
//                $f = $file->store('test', '100.jpg');
//                Так запись корректней
                $f = date('d_m_y');
//                Путь куда сохранить и его имя, называем его рандомным именем
                if ($file->move("uploads/{$f}", $n = $file->getRandomName())) {
                    session()->setFlashdata('file', "{$f}/{$n}");
                    return redirect()->route('main.file_upload')->with('success', 'SUCCESS!');

                } else {
                    return redirect()->route('main.file_upload')->with('errors', 'Error moved file!');
                }


            }
//            d($file->getName());
//            d($file->getTempName());
//            d($file->getClientName());
//            d($file->getClientExtension());
//            d($file->guessExtension());
        }

        return view('main/file_upload', $data);
    }

    public function fileUpload2()
    {
        helper('form');

        $rules = [
            'name' => 'required|min_length[3]|max_length[20]',
            'email' => 'valid_email',
            'userfile' => 'uploaded[userfile]'
        ];

        $data = [
            'title' => 'File Upload [title]',
            'page_title' => 'File Upload!',
        ];

        if ($this->request->getMethod() == 'POST') {
            $file = $this->request->getFile('userfile');

            if ($this->validate($rules)) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $f = date('d_m_y');
//                  Путь куда сохранить и его имя, называем его рандомным именем
                    if ($file->move("uploads/{$f}", $n = $file->getRandomName())) {
                        session()->setFlashdata('file', "{$f}/{$n}");
                    } else {
                        return redirect()->route('main.file_upload2')->with('errors', ['Error moved file!']);
                    }
                }
            } else {
                return redirect()->route('main.file_upload2')->withInput()->with('errors', $this->validator->getErrors());
            }
            return redirect()->route('main.file_upload2')->with('success', 'SUCCESS!');
        }

        return view('main/file_upload2', $data);
    }

    public function fileUpload3()
    {
        helper('form');

        $rules = [
            'userfile' => 'uploaded[userfile]|is_image[userfile]'
        ];

        $data = [
            'title' => 'File Upload [title]',
            'page_title' => 'File Upload 3!',
        ];

        if ($this->request->getMethod() == 'POST') {
            $file = $this->request->getFile('userfile');

//            d($file);

            if ($this->validate($rules)) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $f = date('d_m_y');
                    // Путь куда сохранить и его имя, называем его рандомным именем
                    if ($file->move("uploads/{$f}", $n = $file->getRandomName())) {

                        if (!is_dir("uploads/thumbs/{$f}")) {
                            mkdir("uploads/thumbs/{$f}", 0755);
                        }

                        $image = \Config\Services::image();
//                      Все работы с изображением начинаются с метода widthFile()
                        $image->withFile("uploads/{$f}/{$n}")
//                            Обрезаем изображение и ресайзим до нужных размеров
                            ->fit(287, 215, 'center')
                            ->save("uploads/thumbs/{$f}/{$n}");

                        session()->setFlashdata('file', "thumbs/{$f}/{$n}");
                    } else {
                        return redirect()->route('main.file_upload3')->with('errors', ['Error moved file!']);
                    }
                }
            } else {
                return redirect()->route('main.file_upload3')->withInput()->with('errors', $this->validator->getErrors());
            }
            return redirect()->route('main.file_upload3')->with('success', 'SUCCESS!');
        }

        return view('main/file_upload3', $data);
    }
}
