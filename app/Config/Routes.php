<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');

$routes->get('blog/create', 'Blog::create', ['as' => 'blog_create']);
$routes->post('blog/store', 'Blog::store');

$routes->get('blog/edit/(:num)', 'Blog::edit/$1', ['as' => 'blog_edit']);
$routes->post('blog/update/(:num)', 'Blog::update/$1', ['as' => 'blog_update']);

$routes->get('blog', 'Blog::index');
$routes->get('blog/(:num)', 'Blog::view/$1');
