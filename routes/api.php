<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
* Module Alunos
*/
Route::apiResource("alunos","\App\Modules\General\Alunos\Controllers\AlunosController");
/**
* Module CursoModels
*/
Route::apiResource("cursos","\App\Modules\General\CursoModels\Controllers\CursoModelsController");
/**
* Module Migrations
*/
Route::apiResource("migrations","\App\Modules\General\Migrations\Controllers\MigrationsController");
/**
* Module PasswordResets
*/
Route::apiResource("password_resets","\App\Modules\General\PasswordResets\Controllers\PasswordResetsController");
/**
* Module Users
*/
Route::apiResource("users","\App\Modules\General\Users\Controllers\UsersController");
