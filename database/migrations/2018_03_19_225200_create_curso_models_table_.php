<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD
        Schema::create('curso_models', function (Blueprint $table) {
=======
        Schema::create('cursos', function (Blueprint $table) {
>>>>>>> origin/master
            $table->increments('id');
            $table->string('nome');
            $table->string('abreviatura');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD
        Schema::dropIfExists('curso_models');
=======
        Schema::dropIfExists('cursos');
>>>>>>> origin/master
    }
}
