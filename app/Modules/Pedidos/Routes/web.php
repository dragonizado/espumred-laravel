<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'pedidos'], function () {
	Route::get('/', 'PedidoController@index');
	Route::get('calculo','PedidoController@calculo')->name('calculos');
	Route::post('/', 'PedidoController@create');
});
