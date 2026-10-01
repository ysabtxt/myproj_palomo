<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Welcome::index');
$routes->get('/welcome', 'Welcome::index');
$routes->get('/tasks', 'TaskList::index');
$routes->get('/profile', 'Profile::index');
$routes->get('/about', 'About::index');

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attemptLogin');
$routes->get('/logout', 'Auth::logout');

$routes->get('/tasks', 'TaskList::index');

$routes->get('/tasks/new', 'TaskList::new', ['filter' => 'auth']);
$routes->post('/tasks/create', 'TaskList::create', ['filter' => 'auth']);

$routes->get('/tasks/edit/(:num)', 'TaskList::edit/$1', ['filter' => 'auth']);
$routes->post('/tasks/update/(:num)', 'TaskList::update/$1', ['filter' => 'auth']);

$routes->get('/tasks/delete/(:num)', 'TaskList::delete/$1', ['filter' => 'auth']);