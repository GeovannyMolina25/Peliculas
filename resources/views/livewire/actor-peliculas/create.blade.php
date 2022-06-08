<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear nuevo Actor Pelicula</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="act_id"></label>
                <select wire:model="act_id" name="act_id" id="act_id" class="form-control">
                    <option value="0" select>Seleccione una opción</option>
                    @foreach($actores as $id=>$act_nombre)
							<option value="{{$id}}">{{$act_nombre}}</option>
					@endforeach
                </select>@error('act_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="pel_id"></label>
                <select wire:model="pel_id" name="pel_id" id="pel_id" class="form-control">
                    <option value="0" select>Seleccione una opción</option>
                    @foreach($peliculas as $pel_id=>$pel_nombre)
							<option value="{{$pel_id}}">{{$pel_nombre}}</option>
					@endforeach
                </select>@error('pel_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="apl_papel"></label>
                <input wire:model="apl_papel" type="text" class="form-control" id="apl_papel" placeholder="Papel">@error('apl_papel') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
