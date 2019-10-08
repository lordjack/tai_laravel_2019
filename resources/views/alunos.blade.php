@extends('principal')

@section('cabecalho')
<a href="{{url('/')}}">Home</a>
    <h5>(Seção Blade Cabeçalho)</h5>
    <h2>Alunos Cadastrados</h2>
@endsection

@section('conteudo')
<h5>(Seção Blade conteudo)</h5>
  <h3>Alunos Turma</h3>
@endsection
