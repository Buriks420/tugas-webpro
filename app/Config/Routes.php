<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/item/(:num)', 'Home::detail/$1');
$routes->get('/auth', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/processRegister', 'Auth::processRegister');
$routes->get('/auth/profile', 'Auth::profile');
$routes->post('/auth/updateProfile', 'Auth::updateProfile');

$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/kategori', 'Kategori::index');
$routes->get('/kategori/create', 'Kategori::create');
$routes->post('/kategori/store', 'Kategori::store');
$routes->get('/kategori/edit/(:num)', 'Kategori::edit/$1');
$routes->post('/kategori/update/(:num)', 'Kategori::update/$1');
$routes->get('/kategori/delete/(:num)', 'Kategori::delete/$1');
$routes->get('/kategori/toggleHide/(:num)', 'Kategori::toggleHide/$1');

$routes->get('/alat', 'Alat::index');
$routes->get('/alat/create', 'Alat::create');
$routes->post('/alat/store', 'Alat::store');
$routes->get('/alat/edit/(:num)', 'Alat::edit/$1');
$routes->post('/alat/update/(:num)', 'Alat::update/$1');
$routes->get('/alat/delete/(:num)', 'Alat::delete/$1');
$routes->get('/alat/deleteFotoLainnya/(:num)/(:num)', 'Alat::deleteFotoLainnya/$1/$2');
$routes->get('/alat/toggleHide/(:num)', 'Alat::toggleHide/$1');

$routes->get('/penyewa', 'Penyewa::index');
$routes->get('/penyewa/create', 'Penyewa::create');
$routes->post('/penyewa/store', 'Penyewa::store');

$routes->get('/transaksi', 'Transaksi::index');
$routes->get('/transaksi/create', 'Transaksi::create');
$routes->post('/transaksi/store', 'Transaksi::store');
$routes->get('/transaksi/kembalikan/(:num)', 'Transaksi::kembalikan/$1');