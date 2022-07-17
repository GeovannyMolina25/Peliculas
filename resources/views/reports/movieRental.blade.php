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
                                <th>Genero</th>
                                <th>Nombre</th>
                                <th>Costo</th>
                                <th>Fecha de estreno</th>
                                <th>Pedidos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peliculas as $row)
                                <tr>
                                    <td>{{$row-> pel_nombre}}</td>
                                    <td>{{$row -> pel_fercha_estreno}}</td>
                                    <td>{{$row -> genero -> gen_nombre}}</td>
                                    <td>{{$row -> director -> dir_nombre}}</td>
                                </tr>
                            @endforeach  
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <button  type="button" class="btn btn-danger"><a href="{{ route('pdfs.movieRental') }}">pdf</a></button>
            </div>
            <div>
                <button  type="button" class="btn btn-info"><a href="{{ route('downloads.movieRental') }}">download pdf</a></button>
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