@extends('base1')

@section('content')
    <h2>Cadastrar Nova Raça</h2>
    <hr>
    <div class="container">
    <form class="form" method="POST" action="{{ route('breeds.store') }}">
        @csrf
        <label for="Nome">Nome:</label>
        <input class="form-control" type="text" name="name" id="name" required>
<br>
        <input class="btn btn-success" type="submit" value="Salvar">
        <input class="btn btn-warning" type="reset" value="Limpar">

        
    </form>
<br>
    <a href="{{ route('dashboard') }}">Voltar ao Painel de Controle</a>
    </div>
@endsection
