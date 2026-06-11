<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/listAbsenHariIni', 'Home::getAbsenHariIni');
$routes->get('/karyawan', 'Karyawan::index');
$routes->get('/listKaryawan', 'Karyawan::list');
$routes->get('/editkaryawan/(:num)', 'Karyawan::edit/$1');
$routes->get('/mesin', 'Mesin::index');
$routes->get('/mesin-download', 'Mesin::downloadlog');
$routes->get('/mesin-list', 'Mesin::list');
$routes->get('/downloadlogs/(:num)', 'Mesin::downloadlogs/$1');

$routes->get('/laporan_gaji', 'LaporanGaji::index');
$routes->post('/laporan_gaji/list', 'LaporanGaji::list');

$routes->get('/insentif', 'Insentif::index');
$routes->post('/updatekaryawan', 'Karyawan::update');
