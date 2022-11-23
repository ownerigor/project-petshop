@extends('base')

@section('content')
    <h2>Cadastrar Novo Animal</h2>
    <hr>
    <form method="POST" action="{{ route('animals.store') }}">

        {{-- protection against cross-site request forgering --}}
        @csrf
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
        <div style="color: red";>
            {{ $message }}
        </div>
        @enderror

        {{-- -------------------------------------------- --}}
        <label for="size">Porte</label>
        <input type="text" name="size" id="size" value="{{ old('size') }}">
        @error('size')
        <div style="color: red";>
            {{ $message }}
        </div>
        @enderror
        {{-- -------------------------------------------- --}}

        <label for="color">Cor:</label>
        <input type="text" name="color" id="color" value="{{ old('color') }}">
        @error('color')
        <div style="color: red";>
            {{ $message }}
        </div>
        @enderror
        {{-- ------------------------------------------ --}}
        <label for="age">Idade:</label>
        <input type="number" name="age" id="age" value="{{ old('age') }}">
        @error('age')
        <div style="color: red";>
            {{ $message }}
        </div>
        @enderror
        {{-- ------------------------------------------ --}}
        <label for="breed">Raça</label>
        <select name="breed" id="breed">
            @if($breeds)
                @foreach ($breeds as $breed)
                    <option value="{{$breed->id}}">{{ $breed->name }}</option>
                @endforeach
            @endif
        </select>
        {{-- ------------------------------------------ --}}
        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
    </form>

    {{-- @if(count($errors) > 0)
        {{ dd($errors) }}
    @endif --}}

    {{-- @if($breeds)
        {{ dd($breeds) }}
    @endif --}}

@endsection
