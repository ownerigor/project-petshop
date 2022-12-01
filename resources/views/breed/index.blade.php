@extends('base')

@section('content')
    @if (!is_null($breeds))
        <table class="table table-hover table-sm">
            <tr>
                <th>Nome</th>

                <th colspan="3">Ações</th>
            </tr>
            @foreach ($breeds as $b)
                <tr>
                    <td>{{ $b->name }}</td>

                    <td> <a class="btn btn-info" href="{{ route('breeds.show', $a->id) }}">Visualizar</a> </td>
                    <td> <a class="btn btn-primary" href="{{ route('breeds.edit', $a->id) }}">Editar</a> </td>
                    {{-- form to delete the resource --}}
                    <td>
                        <form action="{{ route('breeds.destroy', $a->id) }}" method="post">
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
            {{ $breeds->links('pagination::bootstrap-5') }}
        </div>
    @else
        <h3>Não há raças cadastradas!</h3>
    @endif

@endsection
