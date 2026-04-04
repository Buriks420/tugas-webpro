<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/auth', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/auth/logout', 'Auth::logout');

$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/kategori', 'Kategori::index');
$routes->get('/kategori/create', 'Kategori::create');
$routes->post('/kategori/store', 'Kategori::store');

$routes->get('/alat', 'Alat::index');
$routes->get('/alat/create', 'Alat::create');
$routes->post('/alat/store', 'Alat::store');

$routes->get('/penyewa', 'Penyewa::index');
$routes->get('/penyewa/create', 'Penyewa::create');
$routes->post('/penyewa/store', 'Penyewa::store');

$routes->get('/transaksi', 'Transaksi::index');
$routes->get('/transaksi/create', 'Transaksi::create');
$routes->post('/transaksi/store', 'Transaksi::store');
$routes->get('/transaksi/kembalikan/(:num)', 'Transaksi::kembalikan/$1');