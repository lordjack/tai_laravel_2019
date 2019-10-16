<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::insert('INSERT INTO alunos(nome, curso, turma) VALUES(?, ?, ?)',
            array('João Paulo França', 'ALIM', 'MEC'));
        DB::insert('INSERT INTO alunos(nome, curso, turma) VALUES(?, ?, ?)',
            array('Mariana Ramos Albernaz', 'INFO', 'INFO2'));

        DB::insert('INSERT INTO curso_models(nome, abreviatura) VALUES(?, ?)',
            array('TÉCNICO EM MÉCANICA - MÉDIO INTEGRADO', 'MEC'));
        DB::insert('INSERT INTO curso_models(nome, abreviatura) VALUES(?, ?)',
            array('TÉCNICO EM INFORMÁTICA - MÉDIO INTEGRADO', 'INFO'));
    }
}
