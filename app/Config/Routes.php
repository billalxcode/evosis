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
$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get("/auth", "Auth::index");
$routes->post("/auth", "Auth::index");
$routes->get("/logout", "Auth::logout");

$routes->group("/vote", function ($routes) {
    $routes->get("", 'Home::indexVote', ['filter' => 'auth']);
    $routes->post("save", "Home::saveVote", ['filter' => 'csrfAuth']);
});

$routes->group("/admin", function ($routes) {
    $routes->get("", "Admin::index", ['filter' => 'authadmin']);
    
    // Auth
    $routes->get("auth", "Admin::auth");
    $routes->post("auth", "Admin::auth");

    $routes->group("siswa", ['filter' => 'authadmin'], function ($routes) {
        $routes->get("", "Siswa::index");
        $routes->get("create", "Siswa::create");
        $routes->get("import", "Siswa::importFile");
        $routes->post("save", "Siswa::save");
        $routes->post("trash", "Siswa::trash");
        $routes->post("process", "Siswa::process");
    });

    $routes->group("kelas", ['filter' => 'authadmin'], function ($routes) {
        $routes->get("", "Kelas::index");
        $routes->post("save", "Kelas::save");
    });

    $routes->group("suara", ['filter' => 'authadmin'], function ($routes) {
        $routes->get("", "Suara::index");
        $routes->post("trash", "Suara::trash");
    });

    $routes->group("kandidat", ['filter' => 'authadmin'], function ($routes) {
        $routes->get("", "Kandidat::index");
        $routes->get("create", "Kandidat::create");
        $routes->post("save", "Kandidat::save");
        $routes->post("trash", "Kandidat::trash");
    });

    $routes->group("settings", ['filter' => 'authadmin'], function ($routes) {
        $routes->get("", "Settings::index");
        $routes->post("save", "Settings::save");
    });
});

$routes->group("/api", function ($routes) {
    $routes->group("kelas", function ($routes) {
        $routes->post("getall", "Rest\Kelas::getAll");
        $routes->post("search", "Rest\Kelas::search");
    });

    $routes->group("suara", function ($routes) {
        $routes->post("getall", "Rest\Suara::getall");
        $routes->post("charts", "Rest\Suara::getChart");
    });

    $routes->group("siswa", function ($routes) {
        $routes->post("getall", "Rest\Siswa::getAll");
        $routes->post("search", "Rest\Siswa::search");
    });

    $routes->group("kandidat", function ($routes) {
        $routes->post("search", "Rest\Kandidat::search");
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
