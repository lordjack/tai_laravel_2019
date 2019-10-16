<?php

namespace App\Http\Controllers;

class ProfessorController extends Controller
{
    public function listar()
    {
        return view('professores');
    }
}
