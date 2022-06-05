<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Alquiler</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="soc_id"></label>
                <input wire:model="soc_id" type="text" class="form-control" id="soc_id" placeholder="Soc Id">@error('soc_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="pel_id"></label>
                <input wire:model="pel_id" type="text" class="form-control" id="pel_id" placeholder="Pel Id">@error('pel_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="alq_fecha_desde"></label>
                <input wire:model="alq_fecha_desde" type="text" class="form-control" id="alq_fecha_desde" placeholder="Alq Fecha Desde">@error('alq_fecha_desde') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="alq_fecha_hasta"></label>
                <input wire:model="alq_fecha_hasta" type="text" class="form-control" id="alq_fecha_hasta" placeholder="Alq Fecha Hasta">@error('alq_fecha_hasta') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="alq_valor"></label>
                <input wire:model="alq_valor" type="text" class="form-control" id="alq_valor" placeholder="Alq Valor">@error('alq_valor') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="alq_fecha_entrega"></label>
                <input wire:model="alq_fecha_entrega" type="text" class="form-control" id="alq_fecha_entrega" placeholder="Alq Fecha Entrega">@error('alq_fecha_entrega') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>
