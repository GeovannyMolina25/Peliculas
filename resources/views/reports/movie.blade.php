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
                                <th>Nombre de la pelicula</th>
                                <th>Genero</th>
                                <th>Valor</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peliculas as $pelicula)
                                <tr>
                                    <td>{{ $pelicula -> pel_nombre}}</td>
                                    <td>{{ $pelicula -> genero -> gen_nombre}}</td>
                                    <td>{{ $pelicula -> pel_costo}}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                <script>
                        const cData = JSON.parse('<?php echo $data; ?>');
						console.log(cData);
                        <td>[cData]</td>
                    </script>
                        
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