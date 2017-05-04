<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application API.
*/

$app->get('users', 'UserController@index'); 
$app->post('users', 'UserController@store'); 
$app->put('users/{user}', 'UserController@update'); 
$app->delete('users/{user}', 'UserController@destroy');