@extends('principal')

@section('cabecalho')
<img src="{{url('/img/homep_ico.png')}}">
    <h2>Principal Cadastrados</h2>
@endsection

@section('conteudo')
<a href="/alunos"><img src="{{url('/img/aluno_ico.png')}}"></a>
<a href="/professores"><img src="{{url('/img/prof_ico.png')}}"></a>

@endsection

