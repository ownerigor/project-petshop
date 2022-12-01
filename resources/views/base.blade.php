<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href=" {{ asset('bootstrap5.2.2/bootstrap.css') }} ">
</head>
<body>
    <div class="container">
        <header>
            <h1>Aplicação Laravel - PetShop</h1>
        </header>
        <nav>
            <ul>
                <li> <a href="{{ route('animals.create') }}">Novo Animal</a> </li>
                <li> <a href="{{ route('animals.index') }}">Listar Animais</a> </li>

                <br>

                <li> <a href="{{ route('breeds.create') }}">Nova Raça</a> </li>
                <li> <a href="{{ route('breeds.index') }}">Listar Raças</a> </li>

            </ul>
        </nav>
        <div class="content">
            {{-- code injection here... --}}
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="{{ asset('bootstrap5.2.2/bootstrap.bundle.js') }}"></script>
</body>
</html>
