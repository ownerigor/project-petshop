@extends('base1')

@section('content')

<h4>Exibindo Animal</h4>

<p> <strong>Nome: </strong>{{ $animal->name }}</p>
<p> <strong>Porte: </strong>{{ $animal->size }}</p>
<p> <strong>Cor: </strong>{{ $animal->color }}</p>
<p> <strong>Idade: </strong>{{ $animal->age }}</p>

<hr>

<a href="{{ route('animals.index') }}">Voltar ao Início</a>
    
@endsection