<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear nuevo socio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="soc_cedula"></label>
                <input wire:model="soc_cedula" type="text" class="form-control" id="soc_cedula" placeholder="Soc Cedula">@error('soc_cedula') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="soc_nombre"></label>
                <input wire:model="soc_nombre" type="text" class="form-control" id="soc_nombre" placeholder="Soc Nombre">@error('soc_nombre') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="soc_direccion"></label>
                <input wire:model="soc_direccion" type="text" class="form-control" id="soc_direccion" placeholder="Soc Direccion">@error('soc_direccion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="soc_telefono"></label>
                <input wire:model="soc_telefono" type="text" class="form-control" id="soc_telefono" placeholder="Soc Telefono">@error('soc_telefono') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="soc_correo"></label>
                <input wire:model="soc_correo" type="text" class="form-control" id="soc_correo" placeholder="Soc Correo">@error('soc_correo') <span class="error text-danger">{{ $message }}</span> @enderror
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
