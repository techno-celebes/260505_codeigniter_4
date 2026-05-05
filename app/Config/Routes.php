<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/testing', 'Home::testing');

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::processLogin');

$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::processRegister');

$routes->get('/logout', 'AuthController::logout');
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);