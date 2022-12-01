@extends('base')

@section('content')
    <h2>Cadastrar Nova Raça</h2>

    <form class="form" method="POST" action="{{ route('breeds.store') }}">
        @csrf
        <label for="Nome">Nome:</label>
        <input type="text" name="name" id="name" required>

        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
    </form>
@endsection
