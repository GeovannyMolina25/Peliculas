@extends('adminlte::page')
@section('title', __('Panel Principal'))

@section('content')

<?php
$etiquetas = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
$datosVentas = [$enero, $febrero, $marzo, $abril, $mayo, $junio, $julio, $agosto, $septiembre, $octubre, $noviembre, $diciembre];

//$etiquetas_sexo = ['Masculino','Femenino'];
//$num_sexo = [$masculino,$femenino];

//$num_sexo['labelS'][]=['Masculino','Femenino'];
//$num_sexo['dataS'][]=[$masculino,$femenino];

?>
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">

				<div class="card-header">
					<h5><span class="text-center fa fa-home"></span> @yield('title')</h5>
				</div>
				<div class="card-body">
					<h5>Hola <strong>{{ Auth::user()->name }},</strong> {{ __('Estas logueado en ') }}{{ config('app.name', 'Laravel') }}</h5>
					</br>
					<hr>

					<div class="row w-500 ">
						
						<div class="col-md">
							<div class="card border-danger mx-sm-1 p-3">
								<div class="card border-danger text-danger p-3 my-card"><span class="text-center fa fa-person-booth" aria-hidden="true"></span></div>
								<div class="text-danger text-center mt-3">
									<h4>Alquiler</h4>
								</div>
								<div class="text-danger text-center mt-2">
									<h1>{{ $num_alquiler }}</h1>
								</div>
							</div>
						</div>
						<div class="col-md">
							<div class="card border-warning mx-sm-1 p-3">
								<div class="card border-warning text-warning p-3 my-card"><span class="text-center fa fa-users" aria-hidden="true"></span></div>
								<div class="text-warning text-center mt-3">
									<h4>Genero</h4>
								</div>
								<div class="text-warning text-center mt-2">
									<h1>{{ $num_genero}}</h1>
								</div>
							</div>
						</div>
						<div class="col-md">
							<div class="card border-success mx-sm-1 p-3">
								<div class="card border-success text-success p-3 my-card"><span class="text-center fa fa-luggage-cart" aria-hidden="true"></span></div>
								<div class="text-success text-center mt-3">
									<h4>peliculas</h4>
								</div>
								<div class="text-success text-center mt-2">
									<h1>{{$num_pelicula}}</h1>
								</div>
							</div>
						</div>

						<div class="col-md">
							<div class="card border-info mx-sm-1 p-3">
								<div class="card border-info text-info p-3 my-card"><span class="text-center fa fa-luggage-cart" aria-hidden="true"></span></div>
								<div class="text-info text-center mt-3">
									<h4>Socio</h4>
								</div>
								<div class="text-info text-center mt-2">
									<h1>{{$num_socio}}</h1>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card card-info direct-chat direct-chat-info">
								<div class="card-header">
									<h3 class="card-title">Total de ingresos</h3>
									<div class="card-tools"></div>
								</div>
								<div>
								<div class="small-box bg-gradient-success">
									<div class="inner">
										<h3>{{$compras}} <?php echo "$"; ?></h3>
										<p>Total de ventas</p>
									</div>
									<div class="icon">
										<i class="fa-solid fa-comment-dollar"></i>
									</div>
									<a href="/alquiler" class="small-box-footer">
										Ver alquileres <i class="fas fa-arrow-circle-right"></i>
									</a>
									</div>
								</div>
						</div>
						</div>
						<div class="col-md-6">
							<div class="card card-danger direct-chat direct-chat-danger">
								<div class="card-header">
									<h3 class="card-title">Cantidad de peliculas</h3>
									<div class="card-tools"></div>
								</div>
								<div>

									<body>
										<canvas id="grafica" ></canvas>
									</body>
									<script>
										const cData = JSON.parse('<?php echo $data; ?>');
										console.log(cData);
										const ctx = document.getElementById("grafica").getContext("2d");
										const myChart = new Chart(ctx, {
											type: "bar",
											data: {
												labels: cData.label,
												datasets: [{
													label: 'num datos',
													data: cData.data,
													backgroundColor: [
														'rgba(255, 99, 132, 0.2)',
														'rgba(255, 159, 64, 0.2)',
														'rgba(255, 205, 86, 0.2)',
														'rgba(75, 192, 192, 0.2)',
														'rgba(54, 162, 235, 0.2)',
														'rgba(153, 102, 255, 0.2)',
														'rgba(201, 203, 207, 0.2)'
													],
													borderColor: [
														'rgb(255, 99, 132)',
														'rgb(255, 159, 64)',
														'rgb(255, 205, 86)',
														'rgb(75, 192, 192)',
														'rgb(54, 162, 235)',
														'rgb(153, 102, 255)',
														'rgb(201, 203, 207)'
													],
													borderWidth: 1
												}]
											},
											options: {
												scales: {
													yAxes: [{
														ticks: {
															beginAtZero: true
														}
													}]
												}
											}
										});
									</script>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card card-info direct-chat direct-chat-success">
								<div class="card-header">
									<h3 class="card-title">Socios Registrados</h3>
									<div class="card-tools"></div>
								</div>
								<div>

									<body>
										<canvas id="grafica2" ></canvas>
										<script type="text/javascript">
											// Obtener una referencia al elemento canvas del DOM
											const $grafica = document.querySelector("#grafica2");
											// Pasaamos las etiquetas desde PHP
											const etiquetas = <?php echo json_encode($etiquetas) ?>;
											// Podemos tener varios conjuntos de datos. Comencemos con uno
											const datosVentas2020 = {
												label: "Usuarios Registrados",
												// Pasar los datos igualmente desde PHP
												data: <?php echo json_encode($datosVentas) ?>,
												backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
												borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
												borderWidth: 1, // Ancho del borde
											};
											new Chart($grafica, {
												type: 'line', // Tipo de gráfica
												data: {
													labels: etiquetas,
													datasets: [
														datosVentas2020,
														// Aquí más datos...
													]
												},
												options: {
													scales: {
														yAxes: [{
															ticks: {
																beginAtZero: true
															}
														}],
													},
												}
											});
										</script>
									</body>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card card-danger direct-chat direct-chat-danger">
								<div class="card-header">
									<h3 class="card-title">Formatopeliculas mas requeridos</h3>
									<div class="card-tools"></div>
								</div>
								<div>

									<body>
										<canvas id="grafica3"></canvas>
									</body>
									<script>
										const fData = JSON.parse('<?php echo $data; ?>');
										console.log(cData);
										const ctx1 = document.getElementById('grafica3');
										const grafico3 = new Chart(ctx1, {
											type: 'pie',
											data: {
												labels: fData.labelF,
												datasets: [{
													label: '# of Votes',
													data: fData.dataF,
													backgroundColor: [
														'rgba(255, 99, 132, 0.2)',
														'rgba(54, 162, 235, 0.2)',
														'rgba(255, 206, 86, 0.2)',
													]
												}]
											},
											options: {
												scales: {
													y: {
														beginAtZero: true
													}
												}
											}
										});
									</script>

								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card card-info direct-chat direct-chat-danger">
								<div class="card-header">
									<h3 class="card-title">Sexo de actores</h3>
									<div class="card-tools"></div>
								</div>
								<div>

									<body>
										<canvas id="grafica4"></canvas>
										<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
										<script type="module">
											const pData = JSON.parse('<?php echo $num_sexo; ?>');

											function totalCasesChart(ctx) {
												const chart = new Chart(ctx, {
													type: 'line',
													data: {
														labels: ['Masculino', 'Femenino'],
														datasets: [{
															label: 'sexo',
															data: [2, 4],
														}]
													}
												})
											}

											function renderCharts() {
												const ctx = document.querySelector('#grafica4').getContext('2d')
												totalCasesChart(ctx)
											}
											renderCharts()
										</script>
									</body>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card card-danger direct-chat direct-chat-danger">
								<div class="card-header">
									<h3 class="card-title">Actores mas requeridos</h3>
									<div class="card-tools"></div>
								</div>
								<div>

									<body>
										<canvas id="grafica5"></canvas>
										<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
										<script type="module">
											const pData = JSON.parse('<?php echo $num_sexo; ?>');

											function totalCasesChart(ctx) {
												const chart = new Chart(ctx, {
													type: 'line',
													data: {
														labels: ['Stanley Kubrick', 'Martin Scorsese', 'Martin Scorsese', 'Steven Spielberg', 'Carmen lara'],
														datasets: [{
															label: 'Peliculas vendidas',
															data: [2, 4, 5, 7, 3],
															backgroundColor: [
																'rgba(80, 99, 132, 0.9)',
																'rgba(80, 159, 64, 0.9)',
																'rgba(80, 205, 70, 0.2)',
																'rgba(40, 45, 192, 0.2)',
																'rgba(60, 162, 244, 0.1)',
																'rgba(200, 102, 255, 0.2)',
																'rgba(201, 203, 207, 0.2)'
															],
														}]
													}
												})
											}

											function renderCharts() {
												const ctx = document.querySelector('#grafica5').getContext('2d')
												totalCasesChart(ctx)
											}
											renderCharts()
										</script>
									</body>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card card-info direct-chat direct-chat-danger">
								<div class="card-header">
									<h3 class="card-title">Promedio de valor peliculas</h3>
									<div class="card-tools"></div>
								</div>
								<div>

									<body>
										<canvas id="grafica7"></canvas>
									</body>
									<script>
										let miCanvas1 = document.getElementById("grafica7").getContext("2d");

										var chart = new Chart(miCanvas1, {
											type: "line",
											data: {
												labels: ["", "", "", "", ""],
												datasets: [{
													label: "Alquileres",
													backgroundColor: ["rgb(0.9,0.1,0.5)",
														"rgba(255, 159, 41, 0.7)"
													],
													borderColor: "rgb(110,197,0)",
													data: [5, 7, 8, 4, 6]
												}]
											}
										})
									</script>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card card-danger direct-chat direct-chat-danger">
								<div class="card-header">
									<h3 class="card-title">Direct Chat</h3>
									<div class="card-tools"></div>
								</div>
								<div>

									<body>
										<canvas id="grafica8"></canvas>
									</body>
									<script>
										let miCanvas2 = document.getElementById("grafica8").getContext("2d");

										var chart = new Chart(miCanvas2, {
											type: "doughnut",
											data: {
												labels: ["Terror", "Accion", "Comedia", "Drama", "Musical"],
												datasets: [{
													label: "Alquileres",
													backgroundColor: ["rgb(0.9,0.1,0.5)",
														"rgba(255, 159, 41, 0.7)"
													],
													borderColor: "rgb(110,197,0)",
													data: [8, 1, 2, 4, 6]
												}]
											}
										})
									</script>
								</div>

							</div>
						</div>
						<div class="col-md-12">
							<div>
								<div class="card card-info direct-chat direct-chat-danger">
									<div class="card-header">
										<h3 class="card-title">Promedio de valor peliculas</h3>
										<div class="card-tools"></div>
									</div>
									<div class="card container">
										<div class="card-body">


											<table class="table table-striped " id="tabla1">
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
													@foreach($peliculas as $pelicula)
													<tr>
														<td>{{$pelicula->gen_id}}</td>
														<td>{{$pelicula->pel_nombre}}</td>
														<td>{{$pelicula->pel_costo}}</td>
														<td>{{$pelicula->pel_fecha_estreno}}</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>

									</div>
								</div>


							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection

	@section('js')


	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$('tabla1').DataTable();
	</script>
	@endsection