<?php
namespace App\Modules\General\CursoModels\Repositories;
use App\Modules\General\CursoModels\Models\CursoModels;

use Illuminate\Http\Request;

class CursoModelsSearchRepository
{
    public function search($queryBuilder, $request){

    if ($request->id) {
        $queryBuilder->where("id","=",$request->id);
    }

    if ($request->nome) {
        $queryBuilder->where("nome","=",$request->nome);
    }

    if ($request->abreviatura) {
        $queryBuilder->where("abreviatura","=",$request->abreviatura);
    }

        return $queryBuilder->paginate(($request->count) ? $request->count : 20);
    }
}