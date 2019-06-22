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

//Make it work
//Initially the constructor message was called, but thats wrong, it is already called when the class is initialized so instead of-
//- calling __construct now I call _getContext
$app->post('mensaje/','PrototypeController@_getContext');
