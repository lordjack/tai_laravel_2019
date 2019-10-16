<?php

namespace App\Http\Controllers;

use App\AlunoModel;
use Request;

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

    public function salvar($id)
    {
        // INSERT
        if ($id == 0) {
            $objAlunoModel = new AlunoModel();
            $objAlunoModel->nome = Request::input('nome');
            $objAlunoModel->curso = Request::input('curso');
            $objAlunoModel->turma = Request::input('turma');
            $objAlunoModel->save();
        } else {
            $objAlunoModel = AlunoModel::find($id);
            $objAlunoModel->nome = Request::input('nome');
            $objAlunoModel->curso = Request::input('curso');
            $objAlunoModel->turma = Request::input('turma');
            $objAlunoModel->save();
        }

        return redirect()->action('AlunoController@listar')->withInput();
    }

    public function editar($id)
    {
        $aluno = AlunoModel::find($id);
        // Verifica se existe um aluno com o 'id' recebido por parâmetro
        if (empty($aluno)) {
            return "<h2>[ERRO]: Aluno não encontrado para o ID=" . $id . "!</h2>";
        }
        return view('AlunoEditar')->with('aluno', $aluno);
    }

    public function remover($id)
    {
        $objAlunoModel = AlunoModel::find($id);
        // Verifica se existe um curso com o 'id' recebido por parâmetro
        if (empty($objAlunoModel)) {
            return "<h2>[ERRO]: Aluno não encontrado para o ID=" . $id . "!</h2>";
        }
        $objAlunoModel->delete();

        return redirect()->action('AlunoController@listar')->withInput();
    }

}
