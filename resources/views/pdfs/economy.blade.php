

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pdf</title>
</head>
<body>
    <table>
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

</body>