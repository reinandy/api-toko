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
