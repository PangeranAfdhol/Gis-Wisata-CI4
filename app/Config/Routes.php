<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->group('autentikasi', function($routes)
{
	$routes->group('login', function($routes)
	{
		$routes->get('', 'Autentikasi::index');
		$routes->post('proses-login', 'Autentikasi::proses_login');
	});
	$routes->group('register', function($routes)
	{
		$routes->get('', 'Autentikasi::register');
		$routes->post('proses-register', 'Autentikasi::proses_register');
	});
	$routes->post('logout', 'Autentikasi::logout');
});

$routes->get('dashboard', 'Dashboard::index');

$routes->group('admin', function($routes)
{
	$routes->group('user', function($routes)
	{
		$routes->get('', 'User::index');

		$routes->group('data', function($routes)
		{
			$routes->get('(:any)', 'User::data_user/$1');
		});
        
        $routes->post('tambah', 'User::tambah');
        $routes->post('edit', 'User::edit');
        $routes->post('hapus', 'User::hapus');

		$routes->group('detail', function($routes)
		{
			$routes->get('(:any)', 'User::detail_user/$1');
		});
	});
});

$routes->group('user', function($routes)
{
	$routes->group('riwayat-login', function($routes)
	{
		$routes->get('', 'RiwayatLogin::index');
		$routes->get('(:any)', 'RiwayatLogin::riwayat_login/$1');
	});
	$routes->get('data-wisata', 'Wisata::index');
	$routes->get('wisata-terdekat', 'Wisata::wisata_terdekat');
});

$routes->group('profil', function($routes)
{
	$routes->get('', 'Profil::index');
	$routes->post('edit', 'Profil::edit');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
