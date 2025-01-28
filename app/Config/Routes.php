<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/', 'Users::index');
$routes->get('/login', 'Login::index');
$routes->get('/logout', 'Login::logout');
$routes->post('/user', 'Login::login');
$routes->get('profile', 'Users::profile');
$routes->post('add-user', 'Users::add_user');
$routes->get('edit-form/(:any)', 'Users::edit_form/$1');
$routes->post('update-user/(:any)', 'Users::update_user/$1');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('search', 'Search::index');
