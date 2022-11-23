{{-- inherit from view base --}}
@extends('base')

{{-- create a section to specific code --}}
@section('content')
    @if (!is_null($animals))
        <table class="table table-hover table-sm">
            <tr>
                <th>Nome</th>
                <th>Porte</th>
                <th>Cor</th>
                <th>Idade</th>
                <th>Raça</th>
                <th colspan="3">Ações</th>
            </tr>
            @foreach ($animals as $a)
                <tr>
                    <td>{{ $a->name }}</td>
                    <td>{{ $a->size }}</td>
                    <td>{{ $a->color }}</td>
                    <td>{{ $a->age }}</td>
                    <td>{{ $a->breed->name }}</td>

                    <td> <a class="btn btn-info" href="{{ route('animals.show', $a->id) }}">Visualizar</a> </td>
                    <td> <a class="btn btn-primary" href="{{ route('animals.edit', $a->id) }}">Editar</a> </td>
                    {{-- form to delete the resource --}}
                    <td>
                        <form action="{{ route('animals.destroy', $a->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Excluir">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{-- creating the links to pagination --}}
        <div class="row">
            {{ $animals->links('pagination::bootstrap-5') }}
        </div>
    @else
        <h3>Não há animais cadastrados!</h3>
    @endif

@endsection
