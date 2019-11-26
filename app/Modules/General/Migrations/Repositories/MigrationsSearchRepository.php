<?php
namespace App\Modules\General\Migrations\Repositories;
use App\Modules\General\Migrations\Models\Migrations;

use Illuminate\Http\Request;

class MigrationsSearchRepository
{
    public function search($queryBuilder, $request){

    if ($request->id) {
        $queryBuilder->where("id","=",$request->id);
    }

    if ($request->migration) {
        $queryBuilder->where("migration","=",$request->migration);
    }

    if ($request->batch) {
        $queryBuilder->where("batch","=",$request->batch);
    }

        return $queryBuilder->paginate(($request->count) ? $request->count : 20);
    }
}