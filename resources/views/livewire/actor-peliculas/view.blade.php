@section('title', __('Actor Peliculas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-user-tie text-info"></i>
							Listado Actores Peliculas</h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Actores Peliculas">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Añadir Actor Peliculas
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.actor-peliculas.create')
						@include('livewire.actor-peliculas.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Actor</th>
								<th>Pelicula</th>
								<th>Papel</th>
								<td>Opciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($ActorPeliculas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->actor->act_nombre }}</td>
								<td>{{ $row->pelicula->pel_nombre }}</td>
								<td>{{ $row->apl_papel }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
									<a class="dropdown-item" onclick="confirm('Confirma Eliminar Actor Pelicula id {{$row->id}}? \nUna vez eliminado Actor Peliculas no se puede recuperar!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $ActorPeliculas->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
