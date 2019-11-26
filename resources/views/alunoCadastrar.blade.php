@extends('principal')

<a href="{{ url('/') }}">Home</a>
@section('cabecalho')
    <a href="/alunos">
        <img src=" {{ url('/img/alunop_ico.png') }}" >
    </a>
    &nbsp;Cadastrar Novo Aluno
    </div>
@stop

@section('conteudo')

    <form action="{{ action('AlunoController@salvar', 0) }}" method="POST">
        <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">

        <label>Nome: </label>
        <input type="text" name="nome" class="form-control">
        <br>
        <label>Curso: </label>
        <input type="text" name="curso" class="form-control">
        <br>
        <label>Turma: </label>
        <input type="text" name="turma" class="form-control">

        <label>Turma ID: </label>
        <select name="turma_id">
            @foreach ($turmas as $item)
                <option value="{{$item->id}}"> {{$item->nome}} </option>
            @endforeach
        </select>
        <br>
        <button type="submit" >Salvar</button>
    </form>
@stop

