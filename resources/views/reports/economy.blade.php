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
                                <th>Nombre pelicula</th>
                                <th>Precio</th>
                                <th>Nombre socio</th>
                                <th>Fecha alquiler</th>
                                <th>Fecha devolucion</th>
                                <th>Costo retraso alquiler</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alquileres as $row)
                            <tr>
                                <td>{{$row -> pelicula ->pel_nombre}}</td>
                                <td>{{$row -> alq_valor}}</td>
                                <td>{{$row -> socio-> soc_nombre}}</td>
                                <td>{{$row -> alq_fecha_desde}}</td>
                                <td>{{$row -> alq_fecha_hasta}}</td>
                                <td>{{$row -> pel_costo}}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                    <div>
                        <button  type="button" class="btn btn-danger active" data-bs-toggle="button" aria-pressed="true"><a href="{{route('pdfs.economy')}}">PDF</a></button>
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