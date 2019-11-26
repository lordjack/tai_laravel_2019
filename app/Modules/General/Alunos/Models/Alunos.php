<?php
namespace App\Modules\General\Alunos\Models;
use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    protected $table    = "alunos";
    protected $fillable = ['id','nome','curso','turma'];

}