<?php
namespace App\Modules\General\Alunos\Repositories;
use App\Modules\General\Alunos\Models\Alunos;

use Illuminate\Http\Request;

class AlunosSearchRepository
{
    public function search($queryBuilder, $request){

    if ($request->id) {
        $queryBuilder->where("id","=",$request->id);
    }

    if ($request->nome) {
        $queryBuilder->where("nome","=",$request->nome);
    }

    if ($request->curso) {
        $queryBuilder->where("curso","=",$request->curso);
    }

    if ($request->turma) {
        $queryBuilder->where("turma","=",$request->turma);
    }

        return $queryBuilder->paginate(($request->count) ? $request->count : 20);
    }
}