@extends('principal')

<a href="{{ url('/') }}">Home</a>
@section('cabecalho')
    <a href="/Cursos">
        <img src=" {{ url('/img/alunop_ico.png') }}">
    </a>
    &nbsp;Editar Curso
    </div>
@stop

@section('conteudo')

    <form action="{{ action('CursoController@salvar', $curso->id) }}" method="POST">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

        <label>Nome: </label>
        <input type="text" name="nome" value="{{$curso->nome}}" class="form-control">
        <br>
        <label>Abreviatura: </label>
        <input type="text" name="abreviatura" value="{{$curso->abreviatura}}" class="form-control">
        <br>
        <button type="submit" class="btn btn-success btn-block">Salvar</button>
    </form>
@stop
