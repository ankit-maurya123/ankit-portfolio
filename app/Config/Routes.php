<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// User/Portfolio Routes
$routes->get('/', 'User::index');
$routes->get('/about', 'User::about');
$routes->get('/projects', 'User::projects');
$routes->get('/contact', 'User::contact');
$routes->post('/contact/send', 'User::sendMessage');
$routes->get('/contact/test', 'User::testForm');
