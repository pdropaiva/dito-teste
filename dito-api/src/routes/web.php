<?php

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

$router->get('event', [
    'as' => 'event.index', 'uses' => 'EventController@index'
]);

$router->post('event', [
    'as' => 'event.store', 'uses' => 'EventController@store'
]);

$router->get('event/search', [
    'as' => 'event.search', 'uses' => 'EventController@search'
]);
