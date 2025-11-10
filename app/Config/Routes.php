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

$routes->get('blog/create', 'Blog::create', ['as' => 'blog_create']);
$routes->post('blog/store', 'Blog::store');

$routes->get('blog/edit/(:num)', 'Blog::edit/$1', ['as' => 'blog_edit']);
$routes->post('blog/update/(:num)', 'Blog::update/$1', ['as' => 'blog_update']);

$routes->get('blog/delete/(:num)', 'Blog::delete/$1', ['as' => 'blog_delete']);

$routes->get('blog', 'Blog::index', ['as' => 'blog_index']);
$routes->get('blog/(:num)', 'Blog::view/$1');

