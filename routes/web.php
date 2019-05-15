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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('perfil','PerfilController@index')->name('perfil');
Route::get('perfil/adicionar','PerfilController@adicionar')->name('perfil/adicionar');
Route::post('perfil/salvar','PerfilController@salvar')->name('perfil/salvar');
Route::get('perfil/consultar','PerfilController@consultar')->name('perfil/consultar');
Route::get('perfil/editar/{id}','PerfilController@editar')->name('perfil/editar');
Route::put('perfil/atualizar/{id}','PerfilController@atualizar')->name('perfil/atualizar');
Route::get('perfil/deletar/{id}','PerfilController@deletar')->name('perfil/deletar');

Route::get('perfiluser','PerfilUserController@index')->name('perfiluser');
Route::get('perfiluser/adicionar','PerfilUserController@adicionar')->name('perfiluser/adicionar');
Route::post('perfiluser/salvar','PerfilUserController@salvar')->name('perfiluser/salvar');
Route::get('perfiluser/consultar','PerfilUserController@consultar')->name('perfiluser/consultar');
Route::get('perfiluser/editar/{id}','PerfilUserController@editar')->name('perfiluser/editar');
Route::put('perfiluser/atualizar/{id}','PerfilUserController@atualizar')->name('perfiluser/atualizar');
Route::get('perfiluser/deletar/{id}','PerfilUserController@deletar')->name('perfiluser/deletar');

Route::get('categoria','CategoriaController@index')->name('categoria');
Route::get('categoria/adicionar','CategoriaController@adicionar')->name('categoria/adicionar');
Route::post('categoria/salvar','CategoriaController@salvar')->name('categoria/salvar');
Route::get('categoria/consultar','CategoriaController@consultar')->name('categoria/consultar');
Route::get('categoria/editar/{id}','CategoriaController@editar')->name('categoria/editar');
Route::put('categoria/atualizar/{id}','CategoriaController@atualizar')->name('categoria/atualizar');
Route::get('categoria/deletar/{id}','CategoriaController@deletar')->name('categoria/deletar');

Route::get('estoque','EstoqueController@index')->name('estoque');
Route::get('estoque/adicionar','EstoqueController@adicionar')->name('estoque/adicionar');
Route::post('estoque/salvar','EstoqueController@salvar')->name('estoque/salvar');
Route::get('estoque/consultar','EstoqueController@consultar')->name('estoque/consultar');
Route::get('estoque/editar/{id}','EstoqueController@editar')->name('estoque/editar');
Route::put('estoque/atualizar/{id}','EstoqueController@atualizar')->name('estoque/atualizar');
Route::get('estoque/deletar/{id}','EstoqueController@deletar')->name('estoque/deletar');

Route::get('cliente','ClienteController@index')->name('cliente');
Route::get('cliente/adicionar','ClienteController@adicionar')->name('cliente/adicionar');
Route::post('cliente/salvar','ClienteController@salvar')->name('cliente/salvar');
Route::get('cliente/consultar','ClienteController@consultar')->name('cliente/consultar');
Route::get('cliente/editar/{id}','ClienteController@editar')->name('cliente/editar');
Route::put('cliente/atualizar/{id}','ClienteController@atualizar')->name('cliente/atualizar');
Route::get('cliente/deletar/{id}','ClienteController@deletar')->name('cliente/deletar');



Route::get('/estoque/ajax/{cat?}',function($cat){
    $return = \App\Categoria::where('nome','=',$cat)->get();

    return Response::json($return);
});

Route::get('/estoque/ajax/consult/{cate?}',function($id){

	 $return = \App\Categoria::where('id','=',$id)->get();

    return Response::json($return);
});