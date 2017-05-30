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

// Route::get('/', function () {
// 	return view('welcome');
// });
// Route::when('*', 'csrf', array('post'));

// Visitante
Route::get('/', 'HomeController@index');


Route::group(['prefix' => 'usuario'], function () {
	Route::get('/', 'UsuarioController@listar');
	Route::get('/cadastrar', 'UsuarioController@cadastrar');
	Route::post('/inserir', 'UsuarioController@inserir');
	Route::get('/listar', 'UsuarioController@listar');
	Route::get('/carregar/{id}', 'UsuarioController@carregar');
	Route::post('/alterar/{id}', 'UsuarioController@alterar');
	Route::get('/remover/{id}', 'UsuarioController@remover');
});

Route::group(['prefix' => 'empresa'], function () {
	Route::get('/', 'EmpresaController@listar');
	Route::get('/cadastrar', 'EmpresaController@cadastrar');
	Route::post('/inserir', 'EmpresaController@inserir');
	Route::get('/listar', 'EmpresaController@listar');
	Route::get('/carregar/{id}', 'EmpresaController@carregar');
	Route::post('/alterar/{id}', 'EmpresaController@alterar');
	Route::get('/remover/{id}', 'EmpresaController@remover');
	Route::get('/getcep/{cep}', 'EmpresaController@getCep');
});

Route::get('entrar', 'HomeController@logar');
Route::post('entrar', 'HomeController@authentication');
Route::get('sair', 'HomeController@logout');

// Verifica se o usuário está logado
// Route::group(array('before' => 'auth'), function()
// {
//     // Rota de artigos
// 	Route::controller('artigos', 'ArtigosController');
// })