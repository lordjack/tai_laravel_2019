<?php
namespace App\Modules\General\Users\Models;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table    = "users";
    protected $fillable = ['id','name','email','password','remember_token'];

}