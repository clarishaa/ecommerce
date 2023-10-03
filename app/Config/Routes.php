<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin', 'Home::admin', ['filter' => 'authGuard']);
$routes->post('/add', 'Home::add', ['filter' => 'authGuard']);
$routes->get('/delete/(:any)', 'Home::delete/$1', ['filter' => 'authGuard']);
$routes->get('/collection', 'Home::collection');
$routes->get('/categories/(:num)', 'Home::categories/$1');
$routes->get('/product/(:num)', 'Home::product/$1');
$routes->get('/specials', 'Home::special');
$routes->get('/blogs', 'Home::blog');
$routes->get('/about', 'Home::about');
$routes->get('/popular', 'Home::popular');
$routes->post('/signin', 'UserController::LoginAuth');
$routes->match(['get', 'post'], '/signup', 'UserController::register', ['filter' => 'authGuard']);
$routes->get('/logout', 'UserController::logout');
$routes->get('/login', 'UserController::login');