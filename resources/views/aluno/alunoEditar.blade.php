@extends('principal')

<a href="{{ url('/') }}">Home</a>
@section('cabecalho')
<a href="/alunos">
    <img src=" {{ url('/img/alunop_ico.png') }}">
</a>
&nbsp;Cadastrar Novo Aluno
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
    <br>
    <label>Turma ID: </label>
    <select name="turma_id">
        @foreach ($turmas as $item)
        <option value="{{ $item->id }}"
        @if ($item->id == old('turma_id', $aluno->turma_id))
            selected="selected"
        @endif
        >{{$item->nome}}</option>
        @endforeach
    </select>
    <br>
    <button type="submit">Salvar</button>
</form>
@stop
