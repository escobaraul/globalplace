<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/**$routes->get('/', 'Home::index');*/

service('auth')->routes($routes);
$routes->GET('logout', function () {
    auth()->logout();
    return redirect()->to('/')->with('success', 'Sesión cerrada correctamente.');
});

$routes->GET('/', 'Advertisements::index');
$routes->GET('advertisements', 'Advertisements::index');
$routes->GET('advertisements/create', 'Advertisements::create');
$routes->POST('advertisements/store', 'Advertisements::store');
$routes->GET('advertisements/edit/(:num)', 'Advertisements::edit/$1');
$routes->POST('advertisements/update/(:num)', 'Advertisements::update/$1');
$routes->GET('advertisements/delete/(:num)', 'Advertisements::delete/$1');

$routes->GET('advertisements/upload/(:num)', 'ImageUploadController::uploadForm/$1');
$routes->POST('advertisements/upload/(:num)', 'ImageUploadController::upload/$1');

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->GET('/', 'AdminController::index');
});
