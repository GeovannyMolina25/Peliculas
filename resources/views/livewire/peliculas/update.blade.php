<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Pelicula</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                <label for="gen_id"></label>
                <select wire:model="gen_id" name="gen_id" id="gen_id" class="form-control">
                    <option value="0" select>Seleccione una opción</option>
                    @foreach($generos as $gen_id=>$gen_nombre)
							<option value="{{$gen_id}}">{{$gen_nombre}}</option>
					@endforeach
                </select>@error('gen_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group">
                <label for="dir_id"></label>
                <!-- <input wire:model="dir_id" type="text" class="form-control" id="dir_id" placeholder="Dir Id">@error('dir_id') <span class="error text-danger">{{ $message }}</span> @enderror -->
                <select wire:model="dir_id" name="dir_id" id="dir_id" class="form-control">
                    @foreach($directores as $dir_id=>$dir_nombre)
							<option value="{{$dir_id}}">{{$dir_nombre}}</option>
					@endforeach
                </select>@error('dir_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
            <label for="for_id"></label>
            <select wire:model="for_id" name="for_id" id="for_id" class="form-control">
                    @foreach($formatos as $for_id=>$for_nombre)
							<option value="{{$for_id}}">{{$for_nombre}}</option>
					@endforeach
                </select>@error('for_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group">
                <label for="pel_nombre"></label>
                <input wire:model="pel_nombre" type="text" class="form-control" id="pel_nombre" placeholder="Nombre Pelicula">@error('pel_nombre') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="pel_costo"></label>
                <input wire:model="pel_costo" type="text" class="form-control" id="pel_costo" placeholder="Costo">@error('pel_costo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="pel_fecha_estreno"></label>
                <input wire:model="pel_fecha_estreno" type="date" class="form-control" id="pel_fecha_estreno" placeholder="Fecha Estreno">@error('pel_fecha_estreno') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
       </div>
    </div>
</div>
