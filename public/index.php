<?php

use App\Exceptions\NotFoundException;
use Router\Router;

require "../vendor/autoload.php";

// Constantes
define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
define('DB_NAME', 'pharmacie');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', '');

// Routes
$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\PharmacieController@welcome');
$router->get('/liste', 'App\Controllers\PharmacieController@index');
$router->get('/liste/:id', 'App\Controllers\PharmacieController@show');

$router->get('/login', 'App\Controllers\UserController@login');
$router->post('/login', 'App\Controllers\UserController@loginPost');
$router->get('/logout', 'App\Controllers\UserController@logout');

$router->get('/admin/pharmacies', 'App\Controllers\Admin\PharmacieController@index');
$router->get('/admin/pharmacies/create', 'App\Controllers\Admin\PharmacieController@create');
$router->post('/admin/pharmacies/create', 'App\Controllers\Admin\PharmacieController@createPharmacie');
$router->post('/admin/pharmacies/delete/:id', 'App\Controllers\Admin\PharmacieController@destroy');
$router->get('/admin/pharmacies/edit/:id', 'App\Controllers\Admin\PharmacieController@edit');
$router->post('/admin/pharmacies/edit/:id', 'App\Controllers\Admin\PharmacieController@update');

try {
     $router->run();
} catch (NotFoundException $e) {
     return $e->error404();
}
