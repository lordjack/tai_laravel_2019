<?php

namespace App\Http\Controllers;

use App\CursoModel;
use Request;

class CursoController extends Controller
{

    public function listar()
    {
        $cursos = CursoModel::orderBy('nome')->get();
        return view('curso.listar')->with('cursos', $cursos);
    }

    public function listarApi()
    {
        $cursos = CursoModel::orderBy('nome')->get();

        return response()->json(['curso' => $cursos])->header('Content-Type', 'application/json');
    }

    public function cadastrar()
    {
        return view('curso.cursoCadastrar');
    }

    public function salvar($id)
    {
        // INSERT
        if ($id == 0) {
            $objCursoModel = new CursoModel();
            $objCursoModel->nome = mb_strtoupper(Request::input('nome'), 'UTF-8');
            $objCursoModel->abreviatura = mb_strtoupper(Request::input('abreviatura'), 'UTF-8');
            $objCursoModel->save();
        } // UPDATE
        else {
            $objCursoModel = CursoModel::find($id);
            $objCursoModel->nome = mb_strtoupper(Request::input('nome'), 'UTF-8');
            $objCursoModel->abreviatura = mb_strtoupper(Request::input('abreviatura'), 'UTF-8');
            $objCursoModel->save();
        }

        return redirect()->action('CursoController@listar')->withInput();
    }

    public function editar($id)
    {

        $curso = CursoModel::find($id);
        // Verifica se existe um curso com o 'id' recebido por parâmetro
        if (empty($curso)) {
            return "<h2>[ERRO]: Curso não encontrado para o ID=" . $id . "!</h2>";
        }
        return view('curso.cursoEditar')->with('curso', $curso);
    }

    public function deletar($id)
    {
        $objCursoModel = CursoModel::find($id);
        // Verifica se existe um curso com o 'id' recebido por parâmetro
        if (empty($objCursoModel)) {
            return "<h2>[ERRO]: Curso não encontrado para o ID=" . $id . "!</h2>";
        }
        $objCursoModel->delete();

        return redirect()->action('CursoController@listar')->withInput();
    }

}
