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

Route::get('/', 'InicioController@index'); 
Route::post('/relatorio', 'InicioController@relatorio')->name('link.relatorio');;
Route::post('/grafico', 'InicioController@grafico')->name('link.grafico');;
Route::post('/pie', 'InicioController@pie')->name('link.pie');;

//Solo en caso de colocar la url manual
Route::get('/relatorio', 'InicioController@index');
Route::get('/grafico', 'InicioController@index');
Route::get('/pie', 'InicioController@index');