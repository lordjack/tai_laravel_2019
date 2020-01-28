@extends('principal')

<a href="{{ url('/') }}">Home</a>
@section('cabecalho')
<a href="/turma">
    <img src=" {{ url('/img/turmap_ico.png') }}">
</a>
&nbsp;Cadastrar Novo Turma
</div>
@stop

@section('conteudo')

<form action="{{ action('TurmaController@salvar', $turma->id) }}" method="POST">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

    <label>Nome: </label>
    <input type="text" name="nome" value="{{$turma->nome}}" class="form-control">
    <br>
    <label>Descrição: </label>
    <input type="text" name="descricao" value="{{$turma->descricao}}" class="form-control">
    <br>
    <button type="submit">Salvar</button>
</form>
@stop
