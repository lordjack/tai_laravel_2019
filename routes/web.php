<?php
/*
Route::get('/', function () {
    return '<h1>Olá mundo</h1>';
});
*/
Route::get('/', function () {
    return view("main");
});

Route::get('/cursos', 'CursoController@listar');
Route::get('/cursos/cadastrar', 'CursoController@cadastrar');
Route::post('/cursos/salvar/{id}', 'CursoController@salvar');
Route::get('/cursos/editar/{id}','CursoController@editar');
Route::get('/cursos/deletar/{id}','CursoController@deletar');
Route::post('/cursos/buscar/','CursoController@buscar');


Route::get('/alunos', 'AlunoController@listar');
Route::get('/alunos/cadastrar', 'AlunoController@cadastrar');
Route::post('/alunos/salvar/{id}', 'AlunoController@salvar');
Route::get('/alunos/editar/{id}','AlunoController@editar');
Route::get('/alunos/deletar/{id}','AlunoController@deletar');
Route::post('/alunos/buscar/','AlunoController@buscar');
Route::get('/apiAluno.json','CursoController@listarApi');

Route::get('/turmas', 'TurmaController@listar');
Route::get('/turmas/cadastrar', 'TurmaController@cadastrar');
Route::post('/turmas/salvar/{id}', 'TurmaController@salvar');
Route::get('/turmas/editar/{id}','TurmaController@editar');
Route::get('/turmas/deletar/{id}','TurmaController@deletar');
Route::post('/turmas/buscar/','TurmaController@buscar');
Route::post('/turma/buscar/','TurmaController@buscar');
