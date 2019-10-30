<?php

namespace App\Http\Controllers;

use App\AlunoModel;
use Request;

class AlunoController extends Controller
{
    public function listar()
    {
        $alunos = AlunoModel::orderBy('nome')->get();
//        dd($alunos);
        return view('alunos')->with('alunos', $alunos);
    }

    public function cadastrar()
    {
        return view('alunoCadastrar');
    }

    public function salvar($id)
    {
        // INSERT
        if ($id == 0) {
            $objAlunoModel = new AlunoModel();
            $objAlunoModel->nome = Request::input('nome');
            $objAlunoModel->curso = Request::input('curso');
            $objAlunoModel->turma = Request::input('turma');
            $objAlunoModel->save();
        }
        return redirect()->action('AlunoController@listar');
    }

}
