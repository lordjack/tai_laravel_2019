<?php

namespace App\Http\Controllers;

use App\AlunoModel;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function listar()
    {
        $alunos = AlunoModel::orderBy('nome')->get();
        return view('alunos')->with('alunos', $alunos);
    }

    public function cadastrar()
    {
        return view('alunoCadastrar');
    }

    public function salvar(Request $request,$id)
    {
        // INSERT
        if ($id == 0) {
            $objAlunoModel = new AlunoModel();
            $objAlunoModel->nome = $request->input('nome');
            $objAlunoModel->curso = $request->input('curso');
            $objAlunoModel->turma = $request->input('turma');
            $objAlunoModel->save();
        } else {
            $objAlunoModel = AlunoModel::find($id);
            $objAlunoModel->nome = $request->input('nome');
            $objAlunoModel->curso = $request->input('curso');
            $objAlunoModel->turma = $request->input('turma');
            $objAlunoModel->save();
        }

        return redirect()->action('AlunoController@listar');
    }

}
