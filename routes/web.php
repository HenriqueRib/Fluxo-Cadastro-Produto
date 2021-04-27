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
Route::get('/produto', 'ProdutoController@index')->name('listar_produtos');
Route::get('/produto/create', 'ProdutoController@create')->name('form_criar_produto');
Route::post('/produto/create', 'ProdutoController@store');
Route::delete('/produto/{id}', 'ProdutoController@destroy');

Route::get('/produto/{produtoId}/informacao', 'InformacaoController@index');

Route::get('/produto/{produtoId}/perguntas', 'PerguntaController@index');
Route::post('/produto/{produtoId}/perguntas', 'PerguntaController@store');
