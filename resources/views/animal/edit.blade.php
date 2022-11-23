@extends('base')

@section('content')
    <h2>Atualizar Animais</h2>
    <hr>
    <form method="POST" action="{{ route('animals.update', $animal->id) }}">
        {{-- protection against cross-site request forgering --}}
        @csrf
        {{-- change the HTTP verb to update resources --}}
        @method("PUT")
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value="{{ old('name') ? old('name') : $animal->name }}">
        @error('name')
        <div style="color: red";>
            {{ $message }}
        </div>
        @enderror

        <label for="size">Porte:</label>
        <input type="text" name="size" id="size" value="{{ old('size') ? old('size') : $animal->size }}">
        @error('size')
        <div style="color: red";>
            {{ $message }}
        </div>
        @enderror        

        <label for="color">Cor:</label>
        <input type="text" name="color" id="color" value="{{ old('color') ? old('color') : $animal->color }}">
        @error('color')
        <div style="color: red";>
            {{ $message }}
        </div>
        @enderror

        <label for="age">Idade:</label>
        <input type="number" name="age" id="age" value="{{ old('age') ? old('age') : $animal->age }}">
        @error('year')
        <div style="color: red";>
            {{ $message }}
        </div>
        @enderror

        <select name="breed" id="breed">
            @if($breeds)
            	@foreach ($breeds as $breed)
                    <option {{ $animal->breed_id == $breed->id ? 'selected' : ''  }}   
                        value="{{ $breed->id }}">{{ $breed->name }}</option>
                @endforeach
            @endif
        </select>

        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
    </form>
@endsection
