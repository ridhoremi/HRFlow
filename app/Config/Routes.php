<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/listAbsenHariIni', 'Home::getAbsenHariIni');
$routes->get('/karyawan', 'Karyawan::index');
$routes->get('/listKaryawan', 'Karyawan::list');
$routes->get('/editkaryawan/(:num)', 'Karyawan::edit/$1');
