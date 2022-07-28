<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home', ['filter' => 'NotLogin']);

$routes->group('bonus', ['filter' => 'NotLogin'], function ($routes) {
	$routes->get('/', 'BonusController');
	$routes->get('form', 'BonusController::form');
	$routes->get('form/(:num)', 'BonusController::form/$1');
	$routes->post('simpan', 'BonusController::simpan');
	$routes->post('simpan/(:num)', 'BonusController::simpan/$1');
	$routes->get('print/(:num)', 'BonusController::print/$1');
});

$routes->group('auth', function ($routes) {
	$routes->get('/', 'AuthController', ['filter' => 'Login']);
	$routes->post('login', 'AuthController::login');
	$routes->get('logout', 'AuthController::logout');
});
$routes->group('absensi', function ($routes) {
	$routes->get('/', 'AbsensiController');
	$routes->get('masuk', 'AbsensiController::masuk');
	$routes->get('keluar/(:num)', 'AbsensiController::keluar/$1');
	$routes->get('log-absensi', 'AbsensiController::log');
	$routes->post('log-absensi', 'AbsensiController::filter');
});

$routes->group('karyawan', function ($routes) {
	$routes->get('/', 'KaryawanController');
	$routes->get('form', 'KaryawanController::create');
	$routes->post('form', 'KaryawanController::push');
	$routes->get('update/(:num)', 'KaryawanController::update/$1');
	$routes->post('update/(:num)', 'KaryawanController::change/$1');
	$routes->get('destroy/(:num)', 'KaryawanController::destroy/$1');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
