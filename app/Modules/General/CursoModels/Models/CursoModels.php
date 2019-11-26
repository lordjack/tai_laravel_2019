<?php
namespace App\Modules\General\CursoModels\Models;
use Illuminate\Database\Eloquent\Model;

class CursoModels extends Model
{
    protected $table    = "curso_models";
    protected $fillable = ['id','nome','abreviatura'];

}