

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">

        <table class="table table-bordered " id="tabla">

            <thead>

                <tr>
                    <th>Nombre de la pelicula</th>
                    <th>Genero</th>
                    <th>Valor</th>

                </tr>
            </thead>
            <tbody>
                @foreach($peliculas as $row)
                <tr>
                    <td>{{$row -> pel_nombre}}</td>
                    <td>{{$row -> genero -> gen_nombre }}</td>
                    <td>{{$row -> pel_costo}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>

