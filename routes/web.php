<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('modulos/{id}', 'HomeController@show')->name('modulos');

/* Clientes */
Route::get('clientes/search_name', 'ClientController@search_name');
Route::get('clientes/search_cod', 'ClientController@search_cod');
