@extends('base1')

@section('content')
    <h2>Cadastrar Novo Animal</h2>
    <hr>

    <div class="container">
        <form  method="POST" action="{{ route('animals.store') }}">
            {{-- protection against cross-site request forgering --}}
            @csrf
            <label for="name">Nome</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
            <div style="color: red";>
                {{ $message }}
            </div>
            @enderror

            {{-- -------------------------------------------- --}}
            <label for="size">Porte</label>
            <input class="form-control" type="text" name="size" id="size" value="{{ old('size') }}">
            @error('size')
            <div style="color: red";>
                {{ $message }}
            </div>
            @enderror
            {{-- -------------------------------------------- --}}

            <label for="color">Cor:</label>
            <input class="form-control" type="text" name="color" id="color" value="{{ old('color') }}">
            @error('color')
            <div style="color: red";>
                {{ $message }}
            </div>
            @enderror
            {{-- ------------------------------------------ --}}
            <label for="age">Idade:</label>
            <input class="form-control" type="number" name="age" id="age" value="{{ old('age') }}">
            @error('age')
            <div style="color: red";>
                {{ $message }}
            </div>
            @enderror
            {{-- ------------------------------------------ --}}
            <label for="breed">Raça</label>
            <select class="form-select" name="breed" id="breed">
                @if($breeds)
                    @foreach ($breeds as $breed)
                        <option value="{{$breed->id}}">{{ $breed->name }}</option>
                    @endforeach
                @endif
            </select>
            {{-- ------------------------------------------ --}}

            <br> 

            <input class="btn btn-success" type="submit" value="Salvar">
            <input class="btn btn-warning" type="reset" value="Limpar">
        </form>
    </div>

    <br>

    <a href="{{ route('dashboard') }}">Voltar ao Painel de Controle</a>

    {{-- @if(count($errors) > 0)
        {{ dd($errors) }}
    @endif --}}

    {{-- @if($breeds)
        {{ dd($breeds) }}
    @endif --}}

@endsection
