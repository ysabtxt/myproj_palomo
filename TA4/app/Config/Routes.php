<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('about', 'About::index');


$routes->get('/customers', 'Customers::index');
$routes->get('/customers/new', 'Customers::new');
$routes->post('/customers/create', 'Customers::create');

$routes->get('/customers/edit/(:num)', 'Customers::edit/$1');
$routes->post('/customers/update/(:num)', 'Customers::update/$1');
$routes->post('customers/delete/(:num)', 'Customers::delete/$1');

$routes->get('/user', 'User::index');

$routes->get('/users/new', 'User::new');
$routes->post('/users/create', 'User::create');

$routes->get('/users/edit/(:num)', 'User::edit/$1');
$routes->post('/users/update/(:num)', 'User::update/$1');
$routes->post('users/delete/(:num)', 'User::delete/$1');

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::authenticate');
$routes->get('/logout', 'Auth::logout');

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/customers', 'Customers::index');
    $routes->get('/customers/create', 'Customers::create');
    $routes->post('/customers/store', 'Customers::store');
    $routes->get('/customers/edit/(:num)', 'Customers::edit/$1');
    $routes->post('/customers/update/(:num)', 'Customers::update/$1');

    $routes->get('/users', 'User::index');
    $routes->get('/users/create', 'User::create');
    $routes->post('/users/store', 'User::store');
    $routes->get('/users/edit/(:num)', 'User::edit/$1');
    $routes->post('/users/update/(:num)', 'User::update/$1');
});