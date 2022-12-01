@extends('base')

@section('content')
    <h2>Atualizar uma Raça</h2>
    <form class="form" id="update-form" method="POST" action="{{ route('breeds.update', $breed->id) }}">
        @csrf

        @method('PUT')
        <label for="Nome">Nome:</label>
        <input type="text" name="name" id="name" required value="{{ $breed->name }}">
    </form>

    <button form="update-form" type="submit">Salvar</button>
    <button form="delete-form" type="submit" value="Excluir" >Excluir</button>

    <form method="POST" class="form" id="delete-form" action="{{ route('breeds.destroy', $breed->id) }}">
        @csrf

        @method('DELETE')
    </form>
@endsection
