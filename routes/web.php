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

Route::get('/', 'InscricaoController@getIndexForm')->name('index');
Route::get('/candidato/novo', 'InscricaoController@getNovoCandidatoForm')->name('candidato.novo');

// Cascade combobox
Route::get('/cascade/carregarAreas/{id}/{sexo}','CascadeController@carregarAreas');
Route::get('/cascade/carregarSubAreas/{id}','CascadeController@carregarSubAreas');
Route::get('/cascade/carregarGuarnicao/{id}','CascadeController@carregarGuarnicao');
Route::get('/cascade/carregarCidades/{id}','CascadeController@carregarCidades');
Route::get('/validar/cpf/{cpf}','ValidacaoController@validacoesCPF');
Route::get('/validar/email/{email}','ValidacaoController@validacoesEmail');

Auth::routes();

Route::get('/candidato/dashboard', 'CandidatoController@showDashboard')->name('candidato.dashboard');
Route::get('/candidato/meusDados', 'CandidatoController@showMeusDados')->name('candidato.meusDados');
Route::get('/candidato/habilitacoes/{id}', 'CandidatoController@showFormHabilitacoes')->name('candidato.habilitacoes');

Route::get('/candidato/excluirHabilitacao/{id}/{idInscricao}', 'CandidatoController@excluirHabilitacao')->name('candidato.excluirHabilitacao');
Route::post('/candidato/habilitacoes/addHabilitacao', 'CandidatoController@addHabilitacao')->name('candidato.addHabilitacao');

Route::get('/candidato/excluirTitulo/{id}/{idInscricao}', 'CandidatoController@excluirTitulo')->name('candidato.excluirTitulo');
Route::post('/candidato/titulos/addTitulo', 'CandidatoController@addTitulo')->name('candidato.addTitulo');

Route::get('/candidato/excluirCurso/{id}/{idInscricao}', 'CandidatoController@excluirCurso')->name('candidato.excluirCurso');
Route::post('/candidato/cursos/addCurso', 'CandidatoController@addCurso')->name('candidato.addCurso');

Route::get('/candidato/excluirPublicacao/{id}/{idInscricao}', 'CandidatoController@excluirPublicacao')->name('candidato.excluirPublicacao');
Route::post('/candidato/publicacoes/addPublicacao', 'CandidatoController@addPublicacao')->name('candidato.addPublicacao');

Route::get('/candidato/excluirCertificado/{id}/{idInscricao}', 'CandidatoController@excluirCertificado')->name('candidato.excluirCertificado');
Route::post('/candidato/publicacoes/addCertificado', 'CandidatoController@addCertificado')->name('candidato.addCertificado');

Route::get('/candidato/excluirExperiencia/{id}/{idInscricao}', 'CandidatoController@excluirExperiencia')->name('candidato.excluirExperiencia');
Route::post('/candidato/experiencias/addExperiencia', 'CandidatoController@addExperiencia')->name('candidato.addExperiencia');

Route::get('/candidato/finalizar/{id}', 'CandidatoController@finalizarInscricao')->name('candidato.finalizar');

Route::get('/candidato/novaInscricao', 'CandidatoController@showFormNovaInscricao')->name('candidato.novaInscricao');
Route::post('/candidato/novaInscricao', 'CandidatoController@salvarNovaInscricao')->name('candidato.salvarNovaInscricao');
Route::get('/candidato/ficha/{id}', 'CandidatoController@gerarFicha')->name('candidato.gerarFicha');
Route::get('/home', 'CandidatoController@showDashboard');