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
