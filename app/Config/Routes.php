<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/403', function () {
    return view('errors/403');
});

$routes->group('api', function (RouteCollection $routes) {
    $routes->group('siswa', function (RouteCollection $routes) {
        $routes->post('get_all', 'Api\Siswa::get_all');
    });
    
    $routes->group('pegawai', function (RouteCollection $routes) {
        $routes->post('get_all', 'Api\Pegawai::get_all');
    });
    
});

$routes->group('admin', function (RouteCollection $routes) {
    $routes->get('', 'Admin\Dashboard::index', ['filter' => 'adminfilter']);

    $routes->group('auth', function (RouteCollection $routes) {
        $routes->get("", "Admin\Auth::login");
        $routes->post("verify", "Admin\Auth::verify");
    });

    $routes->group('siswa', ['filter' => 'adminfilter'], function (RouteCollection $routes) {
        $routes->get('', 'Admin\Siswa::index');
        $routes->get('create', 'Admin\Siswa::create');
        $routes->post('save', 'Admin\Siswa::save');
        $routes->post('trash', 'Admin\Siswa::trash');
    });
    
    $routes->group('pegawai', ['filter' => 'adminfilter'], function (RouteCollection $routes) {
        $routes->get('', 'Admin\Pegawai::index');
        $routes->get('create', 'Admin\Pegawai::create');
        $routes->post('save', 'Admin\Pegawai::save');
        $routes->post('trash', "Admin\Pegawai::trash");
    });

    $routes->group('pemilih', ['filter' => 'adminfilter'], function (RouteCollection $routes) {
        $routes->get("create", "Admin\Pemilih::create");
        // $routes->get('preview', "Admin\Pemilih::preview");
        $routes->post("save", "Admin\Pemilih::save");
        $routes->get("preview", "Api\Pemilih::get_preview");
    });

    $routes->group('tps', ['filter' => 'adminfilter'], function (RouteCollection $routes) {
        $routes->get("", "Admin\TPS::index");
        $routes->get("create", 'Admin\TPS::create');
        $routes->post('save', 'Admin\TPS::save');
    });

    $routes->group('security', ['filter' => 'adminfilter'], function (RouteCollection $routes) {
        $routes->get('', 'Admin\Security::index');
    });
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
