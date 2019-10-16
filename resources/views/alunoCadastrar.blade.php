@extends('principal')

<a href="{{url('/')}}">Home</a>
@section('cabecalho')
    <h2>Cadastrar Aluno</h2>
@endsection

@section('conteudo')
<form action="{{ action('AlunoController@salvar',0) }}" method="POST">
    <input type="hidden" name="" value="" />
    <label>Nome </label>
    <input type="text" name="nome" />
    <label>Curso </label>
    <input type="text" name="curso" />
    <label>Turma </label>
    <input type="text" name="turma" />
</form>

@endsection
