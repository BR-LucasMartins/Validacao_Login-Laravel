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

//--------------------------------------------------------
//default
Route::get('/', 'usuariosController@index');


//-------------------------------------------------------------------
//usuário - login
Route::get('/usuario_frm_login', 'usuariosController@frmLogin');
Route::post('/usuario_executar_login', 'usuariosController@executarLogin');


//--------------------------------------------------------------------
//log out

Route::get('usuario_logout', 'usuariosController@logout');

//--------------------------------------------------------------------
//usuário criar conta 
Route::get('/usuario_frm_criar_conta', 'usuariosController@frmCriarNovaConta');
Route::post('/usuario_executar_criar_conta', 'usuariosController@executarCriarNovaConta');


//--------------------------------------------------------------------
//usuário - recuperar senha
Route::get('/usuario_frm_recuperar_senha', 'usuariosController@frmRecuperarSenha');
Route::post('/usuario_executar_recuperar_senha', 'usuariosController@executarRecuperarSenha');
Route::get('/usuario_email_enviado', 'usuariosController@emailEnviado');


//-- criar nova senha

Route::get('/usuario_frm_nova_senha', 'usuariosController@frmCriarNovaSenha');
Route::post('/usuario_editar_senha', 'usuariosController@editarSenha');


//--------------------------------------------------------------------
//Aplicação
Route::get('aplicacao_index', 'aplicacaoController@apresentarPaginaInicial');