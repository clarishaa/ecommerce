<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/collection', 'Home::collection');
$routes->get('/specials', 'Home::special');
$routes->get('/blogs', 'Home::blog');
$routes->get('/about', 'Home::about');
$routes->get('/popular', 'Home::popular');
$routes->post('/signup', 'Home::register');
['filter'=>'authGuard'];