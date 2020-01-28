<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoModel extends Model {

    protected $table = 'alunos';

    public function turmas()
    {
        return $this->belongsTo(TurmaModel::class,'turma_id','id');
    }
}
