<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nuevo Actor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="sex_id"></label>
                <select wire:model="sex_id" name="sex_id" id="sex_id" class="form-control">
                    <option value="0" select>Seleccione una opción</option>
                    @foreach($sexos as $sex_id=>$sex_nombre)
							<option value="{{$sex_id}}">{{$sex_nombre}}</option>
					@endforeach
                </select>@error('sex_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="act_nombre"></label>
                <input wire:model="act_nombre" type="text" class="form-control" id="act_nombre" placeholder="Act Nombre">@error('act_nombre') <span class="error text-danger">{{ $message }}</span> @enderror
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
