<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Socio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="soc_cedula"></label>
                <input wire:model="soc_cedula" type="text" class="form-control" id="soc_cedula" placeholder="Cedula">@error('soc_cedula') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="soc_nombre"></label>
                <input wire:model="soc_nombre" type="text" class="form-control" id="soc_nombre" placeholder="Nombre Socio">@error('soc_nombre') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="soc_direccion"></label>
                <input wire:model="soc_direccion" type="text" class="form-control" id="soc_direccion" placeholder="Direccion">@error('soc_direccion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="soc_telefono"></label>
                <input wire:model="soc_telefono" type="text" class="form-control" id="soc_telefono" placeholder="Telefono">@error('soc_telefono') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="soc_correo"></label>
                <input wire:model="soc_correo" type="text" class="form-control" id="soc_correo" placeholder="Correo">@error('soc_correo') <span class="error text-danger">{{ $message }}</span> @enderror
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
