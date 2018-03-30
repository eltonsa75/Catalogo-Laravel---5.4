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




Route::get('/', function () {
    return view('welcome');
});

Route::resource('produtos', 'ProdutosController');

Route::post('produtos/buscar', 'ProdutosController@buscar');

Route::get('adicionar-produto', 'ProdutosController@create');
Route::get('produtos/{id}/editar', 'ProdutosController@edit');


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

