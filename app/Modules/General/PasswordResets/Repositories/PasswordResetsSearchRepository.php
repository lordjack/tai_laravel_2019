<?php
namespace App\Modules\General\PasswordResets\Repositories;
use App\Modules\General\PasswordResets\Models\PasswordResets;

use Illuminate\Http\Request;

class PasswordResetsSearchRepository
{
    public function search($queryBuilder, $request){

    if ($request->email) {
        $queryBuilder->where("email","=",$request->email);
    }

    if ($request->token) {
        $queryBuilder->where("token","=",$request->token);
    }

        return $queryBuilder->paginate(($request->count) ? $request->count : 20);
    }
}