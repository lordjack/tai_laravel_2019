@extends('principal')

<a href="{{ url('/') }}">Home</a>
@section('cabecalho')
    <a href="/alunos">
        <img src=" {{ url('/img/alunop_ico.png') }}">
    </a>
    &nbsp;Editar Aluno
    </div>
@stop

@section('conteudo')

    <form action="{{ action('AlunoController@salvar', $aluno->id) }}" method="POST">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

        <label>Nome: </label>
        <input type="text" name="nome" value="{{$aluno->nome}}" class="form-control">
        <br>
        <label>Curso: </label>
        <input type="text" name="curso" value="{{$aluno->curso}}" class="form-control">
        <br>
        <label>Turma: </label>
        <input type="text" name="turma" value="{{$aluno->turma}}" class="form-control">
        <br>
        <button type="submit" class="btn btn-success btn-block">Salvar</button>
    </form>
@stop
