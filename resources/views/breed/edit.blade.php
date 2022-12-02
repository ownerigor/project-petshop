@extends('base1')

@section('content')
    <h2>Atualizar uma Raça</h2>
    <form class="form" id="update-form" method="POST" action="{{ route('breeds.update', $breed->id) }}">
        @csrf

        @method('PUT')
        <label for="Nome">Nome:</label>
        <input class="form-control" type="text" name="name" id="name" required value="{{ $breed->name }}">
    </form>

    <br> 

            <input form="update-form" class="btn btn-success" type="submit" value="Salvar">
            <input  form="delete-form" class="btn btn-warning" type="reset" value="Limpar">
   

    <form method="POST" class="form" id="delete-form" action="{{ route('breeds.destroy', $breed->id) }}">
        @csrf

        @method('DELETE')
    </form>
@endsection
