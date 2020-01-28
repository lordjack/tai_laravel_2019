<?php

namespace App\Http\Controllers;

use App\TurmaModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function listar()
    {
        $turmas = TurmaModel::orderBy('id')->get();
        //dd($turmas);
        return view('turma.listar')->with('turmas', $turmas);
    }

    public function cadastrar()
    {
        $turmas = TurmaModel::orderBy('nome')->get();
        //dd($turmas);

        return view('turma.turmaCadastrar')->with('turmas', $turmas);
    }

    public function editar($id)
    {
        $turma = TurmaModel::find($id);

        return view('turma.turmaEditar')->with('turma', $turma);
    }

    public function salvar(Request $request, $id)
    {
        // INSERT
        if ($id == 0) {
            $objTurmaModel = new TurmaModel();
            $objTurmaModel->nome = $request->input('nome');
            $objTurmaModel->descricao = $request->input('descricao');
            $objTurmaModel->save();
        } else {
            // UPDATE
            $objTurmaModel = TurmaModel::find($id);
            $objTurmaModel->nome = $request->input('nome');
            $objTurmaModel->descricao = $request->input('descricao');
            $objTurmaModel->save();
        }
        return redirect()->action('TurmaController@listar');
    }

    public function deletar($id)
    {
        $turma = TurmaModel::find($id);

        $turma->delete();

        return redirect()->action('TurmaController@listar');

    }

    public function buscar(Request $request)
    {
        $nome = $request->input('nome');

        $turmas = TurmaModel::query()
            ->where('nome', 'like', '%' . $nome . '%')
            ->get();

        return view('turma.listar')->with('turmas', $turmas);
    }
}
