@extends('principal')

<a href="{{ url('/') }}">Home</a>
@section('cabecalho')
    <h2>
        <img src=" {{ url('/img/alunop_ico.png') }}"> &nbsp; Alunos Cadastrados
    </h2>
@stop

@section('conteudo')
    <a href="{{ action('AlunoController@cadastrar') }}" type="button">
        <b>Cadastrar Novo Aluno</b>
    </a>
    <br>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>NOME DO ALUNO</th>
            <th>CURSO</th>
            <th>EVENTOS</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($alunos as $dados)
            <tr>
                <td>{{ $dados->id }}</td>
                <td>{{ $dados->nome }}</td>
                <td>{{ $dados->curso }}</td>

        @endforeach
        </tbody>
    </table>
    <br>
    <br>
@stop
