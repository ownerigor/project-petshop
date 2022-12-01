@extends('base')

@section('content')
    @if (isset($msg))
        <h3 style="color: red">Raça não encontrada!</h3>
    @else
        <h2>Mostrando dados da raça</h2>
        <p><strong>Nome:</strong> {{ $breed->name }} </p>

        <a href="{{ route('breeds.index') }}">Voltar</a>
    @endif
@endsection
