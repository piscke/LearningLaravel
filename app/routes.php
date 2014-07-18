<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

/**
 * usuarios
 */
Route::group(array('prefix' => 'users'), function ()
{
    Route::get('',               'UserController@index');
    Route::get('{id}',           'UserController@get');

    Route::post('',              'UserController@post');
    Route::put('{id}',           'UserController@put');

    Route::delete('{id}',        'UserController@delete');
});

