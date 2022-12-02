@extends('base1')

@section('content')
    @if (isset($msg))
        <h3 style="color: red">Raça não encontrada!</h3>
    @else
        <h4>Mostrando dados da raça</h4>
        <p><strong>Nome:</strong> {{ $breed->name }} </p>
<hr>
        <a href="{{ route('breeds.index') }}">Voltar</a>
    @endif
@endsection
