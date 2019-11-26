<?php
/*
Route::get('/', function () {
    return '<h1>Olá mundo</h1>';
});
*/
Route::get('/', function () {
    return view("main");
});

Route::get('/alunos', 'AlunoController@listar');
Route::get('/alunos/cadastrar', 'AlunoController@cadastrar');
Route::get('/alunos/editar/{id}', 'AlunoController@editar');
Route::get('/alunos/remover/{id}', 'AlunoController@remover');
Route::post('/alunos/salvar/{id}', 'AlunoController@salvar');

Route::get('/professores', 'ProfessorController@listar');

Route::get('/cursos', 'CursoController@listar');
Route::get('/cursos/cadastrar', 'CursoController@cadastrar');
Route::get('/cursos/editar/{id}', 'CursoController@editar');
Route::get('/cursos/confirmar/{id}', 'CursoController@confirmar');
Route::post('/cursos/salvar/{id}', 'CursoController@salvar');
Route::get('/cursos/remover/{id}', 'CursoController@remover');
