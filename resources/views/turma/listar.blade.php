@extends('principal')

<a href="{{ url('/') }}">Home</a>
@section('cabecalho')
    <h2>
        <img src=" {{ url('/img/turmap_ico.png') }}"> &nbsp; Turmas Cadastrados
    </h2>
@stop

@section('conteudo')
    <a href="{{ action('TurmaController@cadastrar') }}" type="button">
        <b>Cadastrar Novo Turma</b>
    </a>
    <br>

    <form action="{{ action('TurmaController@buscar') }}" method="post">
        <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">

        <label>Nome: </label><br>
        <input type="text" name="nome" ><br>
        <button type="submit" >Buscar</button>
    </form>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>TURMA</th>
            <th>DESCRIÇÃO</th>
            <th>AÇÕES</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($turmas as $dado)
            <tr>
                <td>{{ $dado->id }}</td>
                <td>{{ $dado->nome }}</td>
                <td>{{ $dado->descricao }}</td>
                <td>
                    <a href="{{ action('TurmaController@editar',$dado->id)}}">Editar</a>
                    <a href="{{ action('TurmaController@deletar',$dado->id)}}">Deletar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    <br>
@stop
