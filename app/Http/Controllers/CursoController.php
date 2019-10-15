<?php

namespace App\Http\Controllers;

use App\CursoModel;
use Request;

class CursoController extends Controller
{

    public function listar()
    {

        $cursos = CursoModel::orderBy('nome')->get();
        return view('cursos')->with('cursos', $cursos);
    }

    public function cadastrar()
    {
        return view('cursoCadastrar');
    }

    public function salvar($id)
    {
        // INSERT
        if ($id == 0) {
            $objCursoModel = new CursoModel();
            $objCursoModel->nome = mb_strtoupper(Request::input('nome'), 'UTF-8');
            $objCursoModel->abreviatura = mb_strtoupper(Request::input('abreviatura'), 'UTF-8');
            $objCursoModel->save();
        }

        return redirect()->action('CursoController@listar')->withInput();
    }

    public function editar($id)
    {

    }

    public function confirmar($id)
    {

    }


}
