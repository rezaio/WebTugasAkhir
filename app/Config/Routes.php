<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setAutoRoute(true);

$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(MYSQLI_DATA_TRUNCATED);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');

$routes->get('rekap/index', 'Rekap::index');


//export
$routes->get('harian/export', 'Harian::export');
$routes->get('minuman/export', 'Minuman::export');


$routes->get('/admin/home', 'Home::index', ['as' => 'home', 'filter' => 'auth:admin']);
$routes->get('/user/user', 'User::index', ['as' => 'home', 'filter' => 'auth:user']);
// $routes->get('/admin', 'Admin::index', ['as' => 'home', 'filter' => 'auth']);

// $routes->get('/admin/home', 'Home::index', ['as' => 'home-index', 'filter' => 'auth:admin']);
// $routes->get('/user/home', 'User::index', ['as' => 'user-home', 'filter' => 'auth:user']);


// Authentication Section
$routes->get('/login', 'Auth::index', ['as' => 'login']);
$routes->post('/login/auth', 'Auth::auth', ['as' => 'auth']);
$routes->get('/logout', 'Auth::logout', ['as' => 'logout']);


// $routes->get('/home', 'Auth::index', ['filter' => 'auth']);


$routes->get('excelharian/exporthari', 'ExcelHarian::exporthari');

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
