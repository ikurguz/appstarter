<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');

// в данном примере используется метод match который
// позволяет сделать и вид и обработчик на одной странице
//к форме можно будет обратиться методом get и post
$routes->match(['get', 'post'], 'test', 'Main::test', ['as' => 'main.test']);

// Уроки по валидации файлов
$routes->match(['get', 'post'], 'file-upload', 'Main::fileUpload', ['as' => 'main.file_upload']);
$routes->match(['get', 'post'], 'file-upload2', 'Main::fileUpload2', ['as' => 'main.file_upload2']);
$routes->match(['get', 'post'], 'file-upload3', 'Main::fileUpload3', ['as' => 'main.file_upload3']);

$routes->get('user/register', 'User::register', ['as' => 'user.register']);
$routes->post('user/store', 'User::store', ['as' => 'user.store']);

$routes->match(['get', 'post'], 'test2', 'Main::test2', ['as' => 'main.test2']);

$routes->get('blog/create', 'Blog::create', ['as' => 'blog_create']);
$routes->post('blog/store', 'Blog::store');

$routes->get('blog/edit/(:num)', 'Blog::edit/$1', ['as' => 'blog_edit']);
$routes->post('blog/update/(:num)', 'Blog::update/$1', ['as' => 'blog_update']);

$routes->get('blog/delete/(:num)', 'Blog::delete/$1', ['as' => 'blog_delete']);

$routes->get('blog', 'Blog::index', ['as' => 'blog_index']);
$routes->get('blog/(:num)', 'Blog::view/$1');

