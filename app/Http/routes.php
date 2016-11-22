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
$app->group(['prefix' => 'projects', 'middleware' => 'jwt.auth'], function($app) {
    $app->post('/', 'App\Http\Controllers\ProjectsController@store');
    $app->put('/{projectId}', 'App\Http\Controllers\ProjectsController@update');
    $app->delete('/{projectId}', 'App\Http\Controllers\ProjectsController@destroy');
});