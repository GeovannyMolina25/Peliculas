@extends('adminlte::page')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <table class="table table-bordered " id="tabla">
                        <thead>
                            <tr>
                                <th>Alquilador</th>
                                <th>Nombre pelicula</th>
                                <th>Dias restantes</th>
                                <th>Precio alquiler</th>
                                <th>Genero</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alquileres as $alquiler)
                                <tr>
                                    <td>{{$alquiler -> socio -> soc_nombre }}</td>
                                    <td>{{$alquiler -> pelicula -> pel_nombre}}</td>
                                    <td>{{$alquiler ->pel_id}}</td>
                                    <td>{{$alquiler ->alq_valor}} </td>
                                    <td>{{$alquiler ->pelicula -> genero->gen_nombre}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    var tabla = document.querySelector("#tabla");
    var dataTable = new DataTable(tabla);
</script>

@endsection