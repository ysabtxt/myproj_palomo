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