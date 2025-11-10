<?php


namespace App\Controllers;


use App\Models\BlogModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Blog extends BaseController
{

    public $blogModel;

    // конструктор класса чтобы каждый раз не создавать объект
    public function __construct()
    {
        $this->blogModel = new BlogModel();
    }

    public function index()
    {
        $blogModel = $this->blogModel;
        $posts = $blogModel->findAll();
        $data = [
            'title' => 'Блог',
            'posts' => $posts,
        ];
        return view('blog/index', $data);
    }

    public function view($id)
    {

        $blogModel = $this->blogModel;
        $post = $blogModel->find($id);

        if (!$post) {
            // выводит страницу 404
            throw PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => $post['title'],
            'post' => $post,
        ];

        return view('blog/view', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Создать статью'
        ];

        return view('blog/create', $data);
    }

    public function store()
    {
        // $data = $this->request->getPost();
        // print_r($data);
        $data = $this->request->getPost();
        $blogModel = $this->blogModel;
        $blogModel->insert($data);
        return redirect('blog_create');
    }

    public function edit($id)
    {
        helper('form');
        $blogModel = $this->blogModel;
        $post = $blogModel->find($id);

        if (!$post) {
            // выводит страницу 404
            throw PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => "Редактировать запись id {$post['id']}",
            'post' => $post,
        ];
        return view('blog/edit', $data);
    }

    public function update($id)
    {
        $post = $this->blogModel->find($id);
        if (!$post) {
            // выводит страницу 404
            throw PageNotFoundException::forPageNotFound();
        }
        $data = $this->request->getPost();
        $result = $this->blogModel->update($id, $data);
        return redirect()->route('blog_edit', [$id]);
    }

    public function delete($id)
    {
        $post = $this->blogModel->find($id);
        if (!$post) {
            // выводит страницу 404
            throw PageNotFoundException::forPageNotFound();
        }

        $this->blogModel->delete($id);

        return redirect()->route('blog_index');
    }

}