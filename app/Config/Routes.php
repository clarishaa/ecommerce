<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin', 'Home::admin', ['filter' => 'authGuard']);
$routes->post('/add', 'Home::add', ['filter' => 'authGuard']);
$routes->get('/delete/(:any)', 'Home::delete/$1', ['filter' => 'authGuard']);
$routes->get('/collection', 'Home::collection', ['filter' => 'authGuard']);
$routes->get('/categories/(:num)', 'Home::categories/$1', ['filter' => 'authGuard']);
$routes->get('/product/(:num)', 'Home::product/$1', ['filter' => 'authGuard']);
$routes->get('/specials', 'Home::special', ['filter' => 'authGuard']);
$routes->get('/blogs', 'Home::blog', ['filter' => 'authGuard']);
$routes->get('/about', 'Home::about', ['filter' => 'authGuard']);
$routes->get('/popular', 'Home::popular', ['filter' => 'authGuard']);
$routes->post('/signin', 'UserController::LoginAuth');
$routes->match(['get', 'post'], '/signup', 'UserController::register');
$routes->get('/logout', 'UserController::logout');
$routes->get('/login', 'UserController::login');