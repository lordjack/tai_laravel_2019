<?php
namespace App\Modules\General\Migrations\Models;
use Illuminate\Database\Eloquent\Model;

class Migrations extends Model
{
    protected $table    = "migrations";
    protected $fillable = ['id','migration','batch'];

}