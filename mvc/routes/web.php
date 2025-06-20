<?php

use App\Routes\Route;
use App\Controllers\HomeController;
use App\Controllers\ClientController;
use App\Controllers\UserController;
use App\Controllers\AuthController;

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/home/index', 'HomeController@index');

//routing pour les tables client
Route::get('/client', 'ClientController@index');
Route::get('/client/show', 'ClientController@show');
Route::get('/client/create', 'ClientController@create');
Route::post('/client/store', 'ClientController@store');
Route::get('/client/edit', 'ClientController@edit');
Route::post('/client/edit', 'ClientController@update');
Route::post('/client/delete', 'ClientController@delete');

//Routing pour les tables tea
Route::get('/tea', 'TeaController@index');
Route::get('/tea/show', 'TeaController@show');
Route::get('/tea/create', 'TeaController@create');
Route::post('/tea/store', 'TeaController@store');
Route::get('/tea/edit', 'TeaController@edit');
Route::post('/tea/edit', 'TeaController@update');
Route::post('/tea/delete', 'TeaController@delete');

//Routing pour la table transaction
Route::get('/transaction', 'TransactionController@index');

Route::dispatch();
