@extends('base1')

@section('content')
    @if (!is_null($breeds))
        <table class="table table-hover table-sm table-striped">
            <tr>
                <th>Nome</th>

                <th colspan="3">Ações</th>
            </tr>
            @foreach ($breeds as $b)
                <tr>
                    <td>{{ $b->name }}</td>

                    <td> <a class="btn btn-info" href="{{ route('breeds.show', $b->id) }}">Visualizar</a> </td>
                    <td> <a class="btn btn-primary" href="{{ route('breeds.edit', $b->id) }}">Editar</a> </td>
                    {{-- form to delete the resource --}}
                    <td>
                        <form action="{{ route('breeds.destroy', $b->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Excluir">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <br>
    <a href="{{ route('dashboard') }}">Voltar ao Painel de Controle</a>
         @else
        <h3>Não há raças cadastradas!</h3>
    @endif

@endsection
