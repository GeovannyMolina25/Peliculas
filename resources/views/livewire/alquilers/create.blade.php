<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear nuevo alquiler</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
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
                    <option value="0" select>Seleccione una opción</option>
                    @foreach($peliculas as $pel_id=>$pel_nombre)
							<option value="{{$pel_id}}">{{$pel_nombre}}</option>
					@endforeach
                </select>@error('pel_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="alq_fecha_desde"></label>
                <input wire:model="alq_fecha_desde" type="text" class="form-control" id="alq_fecha_desde" placeholder="Alquila Desde">@error('alq_fecha_desde') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="alq_fecha_hasta"></label>
                <input wire:model="alq_fecha_hasta" type="text" class="form-control" id="alq_fecha_hasta" placeholder="Alquila Hasta">@error('alq_fecha_hasta') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="alq_valor"></label>
                <input wire:model="alq_valor" type="text" class="form-control" id="alq_valor" placeholder="Valor">@error('alq_valor') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="alq_fecha_entrega"></label>
                <input wire:model="alq_fecha_entrega" type="text" class="form-control" id="alq_fecha_entrega" placeholder="Fecha Entrega">@error('alq_fecha_entrega') <span class="error text-danger">{{ $message }}</span> @enderror
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
