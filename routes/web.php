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
Route::post('/alunos/salvar/{id}', 'AlunoController@salvar');
Route::get('/alunos/editar/{id}','AlunoController@editar');
Route::get('/alunos/deletar/{id}','AlunoController@deletar');
Route::post('/alunos/buscar/','AlunoController@buscar');