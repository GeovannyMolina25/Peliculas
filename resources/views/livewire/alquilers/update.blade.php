<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Alquiler</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                <label for="soc_id"></label>
                <select wire:model="soc_id" name="soc_id" id="soc_id" class="form-control">
                    <option value="0" select>Seleccione una opción</option>
                    @foreach($socios as $soc_id=>$soc_nombre)
							<option value="{{$soc_id}}">{{$soc_nombre}}</option>
					@endforeach
                </select>@error('soc_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="pel_id"></label>
                <select wire:model="pel_id" name="pel_id" id="pel_id" class="form-control">
                    @foreach($peliculas as $pel_id=>$pel_nombre)
							<option value="{{$pel_id}}">{{$pel_nombre}}</option>
					@endforeach
                </select>@error('pel_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="alq_fecha_desde"></label>
                <input wire:model="alq_fecha_desde" type="date" class="form-control" id="alq_fecha_desde" placeholder="Fecha Desde">@error('alq_fecha_desde') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="alq_fecha_hasta"></label>
                <input wire:model="alq_fecha_hasta" type="date" class="form-control" id="alq_fecha_hasta" placeholder="Fecha Hasta">@error('alq_fecha_hasta') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="alq_valor"></label>
                <input wire:model="alq_valor" type="text" class="form-control" id="alq_valor" placeholder="Valor">@error('alq_valor') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="alq_fecha_entrega"></label>
                <input wire:model="alq_fecha_entrega" type="date" class="form-control" id="alq_fecha_entrega" placeholder="Fecha Entrega">@error('alq_fecha_entrega') <span class="error text-danger">{{ $message }}</span> @enderror
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
