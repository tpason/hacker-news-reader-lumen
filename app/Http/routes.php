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

$app->get('/', function () use ($app) {
    return $app->version();
});
$app->get('/{type}', 'HomeController@index');
$app->get('/', 'HomeController@index');

$app->group(['prefix' => 'api/v1'], function($app)
{
    $app->post('car','CarController@createCar');

    $app->put('car/{id}','CarController@updateCar');

    $app->delete('car/{id}','CarController@deleteCar');

    $app->get('car','CarController@index');
});

