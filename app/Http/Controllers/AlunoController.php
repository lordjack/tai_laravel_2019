<?php

namespace App\Http\Controllers;

use App\AlunoModel;
use App\TurmaModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function listar()
    {
        $alunos = AlunoModel::orderBy('nome')->get();
        //        dd($alunos);
        return view('aluno.listar')->with('alunos', $alunos);
    }

    public function cadastrar()
    {
        $turmas = TurmaModel::orderBy('nome')->get();
        //dd($turmas);

        return view('aluno.alunoCadastrar')->with('turmas', $turmas);
    }

    public function editar($id)
    {
        $aluno = AlunoModel::find($id);

        return view('aluno.alunoEditar')->with('aluno', $aluno);
    }

    public function salvar(Request $request, $id)
    {
        // INSERT
        if ($id == 0) {
            $objAlunoModel = new AlunoModel();
            $objAlunoModel->nome = $request->input('nome');
            $objAlunoModel->curso = $request->input('curso');
            $objAlunoModel->turma_id = $request->input('turma_id');
            $objAlunoModel->save();
        } else {
            // UPDATE
            $objAlunoModel = AlunoModel::find($id);
            $objAlunoModel->nome = $request->input('nome');
            $objAlunoModel->curso = $request->input('curso');
            $objAlunoModel->turma_id = $request->input('turma_id');
            $objAlunoModel->save();
        }
        return redirect()->action('AlunoController@listar');
    }

    public function deletar($id)
    {
        $aluno = AlunoModel::find($id);

        $aluno->delete();

        return redirect()->action('AlunoController@listar');

        //  return redirect()->route('alunos');
    }

    public function buscar(Request $request)
    {
        $nome = $request->input('nome');

        $alunos = AlunoModel::query()
            ->where('nome', 'like', '%' . $nome . '%')
            ->get();

        return view('aluno.listar')->with('alunos', $alunos);
    }
}
