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

Route::get('/', ['as' => 'login', 'uses' => 'Auth\LoginController@index']);

//$this->group(['namespace' => 'Controller', 'middleware' => 'auth'], function () {

// Área
Route::get('area', ['as' => 'area.index', 'uses' => 'AreaController@index']);
Route::get('area/{id}', ['as' => 'area.show', 'uses' => 'AreaController@show']);
Route::get('area/tabela', ['as' => 'area.tabela', 'uses' => 'AreaController@tabelaAjax']);
Route::post('area/insert', ['as' => 'area.insert', 'uses' => 'AreaController@insertArea']);
Route::put('area/update/{id}', ['as' => 'area.update', 'uses' => 'AreaController@updateArea']);
Route::put('area/status/{id}', ['as' => 'area.status', 'uses' => 'AreaController@statusArea']);
Route::post('area/delete/{id}', ['as' => 'area.delete', 'uses' => 'AreaController@deleteArea']);

// Divisão
Route::get('divisao', ['as' => 'divisao.index', 'uses' => 'DivisaoController@index']);
Route::get('divisao/{id}', ['as' => 'divisao.show', 'uses' => 'DivisaoController@show']);
Route::get('divisao/tabela', ['as' => 'divisao.tabela', 'uses' => 'DivisaoController@tabelaAjax']);
Route::post('divisao/insert', ['as' => 'divisao.insert', 'uses' => 'DivisaoController@insertDivisao']);
Route::put('divisao/update/{id}', ['as' => 'divisao.update', 'uses' => 'DivisaoController@updateDivisao']);
Route::put('divisao/status/{id}', ['as' => 'divisao.status', 'uses' => 'DivisaoController@statusDivisao']);
Route::post('divisao/delete/{id}', ['as' => 'divisao.delete', 'uses' => 'DivisaoController@deleteDivisao']);

// Categoria
Route::get('categoria', ['as' => 'categoria.index', 'uses' => 'CategoriaController@index']);
Route::get('categoria/{id}', ['as' => 'categoria.show', 'uses' => 'CategoriaController@show']);
Route::get('categoria/tabela', ['as' => 'categoria.tabela', 'uses' => 'CategoriaController@tabelaAjax']);
Route::post('categoria/insert', ['as' => 'categoria.insert', 'uses' => 'CategoriaController@insertCategoria']);
Route::put('categoria/update/{id}', ['as' => 'categoria.update', 'uses' => 'CategoriaController@updateCategoria']);
Route::put('categoria/status/{id}', ['as' => 'categoria.status', 'uses' => 'CategoriaController@statusCategoria']);
Route::post('categoria/delete/{id}', ['as' => 'categoria.delete', 'uses' => 'CategoriaController@deleteCategoria']);

// TipoDeProblema
Route::get('tipodeproblema', ['as' => 'tipodeproblema.index', 'uses' => 'TipoDeProblemaController@index']);
Route::get('tipodeproblema/{id}', ['as' => 'tipodeproblema.show', 'uses' => 'TipoDeProblemaController@show']);
Route::get('tipodeproblema/tabela', ['as' => 'tipodeproblema.tabela', 'uses' => 'TipoDeProblemaController@tabelaAjax']);
Route::post('tipodeproblema/insert', ['as' => 'tipodeproblema.insert', 'uses' => 'TipoDeProblemaController@insertTipoDeProblema']);
Route::put('tipodeproblema/update/{id}', ['as' => 'tipodeproblema.update', 'uses' => 'TipoDeProblemaController@updateTipoDeProblema']);
Route::put('tipodeproblema/status/{id}', ['as' => 'tipodeproblema.status', 'uses' => 'TipoDeProblemaController@statusTipoDeProblema']);
Route::post('tipodeproblema/delete/{id}', ['as' => 'tipodeproblema.delete', 'uses' => 'TipoDeProblemaController@deleteTipoDeProblema']);

//});

Route::get('home', ['as' => 'home.index', 'uses' => 'HomeController@index']);

Auth::routes();



