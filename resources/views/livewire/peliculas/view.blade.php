@section('title', __('Peliculas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-film text-info"></i>
							Listado Peliculas </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Peliculas">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Añadir Peliculas
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.peliculas.create')
						@include('livewire.peliculas.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Genero</th>
								<th>Director</th>
								<th>Formato</th>
								<th>Pelicula</th>
								<th>Costo</th>
								<th>Fecha Estreno</th>
								<td>Opciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($peliculas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->genero->gen_nombre }}</td>
								<td>{{ $row->director->dir_nombre }}</td>
								<td>{{ $row->formato->for_nombre }}</td>
								<td>{{ $row->pel_nombre }}</td>
								<td>{{ $row->pel_costo }}</td>
								<td>{{ $row->pel_fecha_estreno }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Pelicula id {{$row->id}}? \nDeleted Peliculas cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $peliculas->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
