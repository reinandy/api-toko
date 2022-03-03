<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('login', 'UserController@login');

$router->group([
    // 'middleware' => 'api',
    'prefix' => 'roles'
], function () use ($router) {
    $router->get('', 'RoleController@index');
});

$router->group([
    // 'middleware' => 'api',
    'prefix' => 'users'
], function () use ($router) {
    $router->get('', 'UserController@index');
    $router->post('', 'UserController@store');
    $router->get('{id}', 'UserController@show');
    $router->post('{id}', 'UserController@update');
    $router->delete('{id}', 'UserController@destroy');
});

$router->group([
    // 'middleware' => 'api',
    'prefix' => 'menus'
], function () use ($router) {
    $router->get('', 'MenuController@index');
    $router->post('', 'MenuController@store');
    $router->get('{id}', 'MenuController@show');
    $router->post('{id}', 'MenuController@update');
    $router->delete('{id}', 'MenuController@destroy');
});

$router->group([
    // 'middleware' => 'api',
    'prefix' => 'receipts'
], function () use ($router) {
    $router->post('', 'ReceiptController@store');
    $router->get('{id}', 'ReceiptController@show');
    $router->post('pay/{id}', 'ReceiptController@pay');
    $router->delete('{id}', 'ReceiptController@destroy');

    $router->post('add-menu/{id}', 'ReceiptController@addMenu');
    $router->post('update-menu/{id}', 'ReceiptController@updateMenu');
    $router->delete('delete-menu/{id}', 'ReceiptController@deleteMenu');
});

$router->group([
    // 'middleware' => 'api',
    'prefix' => 'report'
], function () use ($router) {
    $router->get('', 'ReportController@index');
});
