<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Pelicula</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="gen_id"></label>
                <input wire:model="gen_id" type="text" class="form-control" id="gen_id" placeholder="Gen Id">@error('gen_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="dir_id"></label>
                <input wire:model="dir_id" type="text" class="form-control" id="dir_id" placeholder="Dir Id">@error('dir_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="for_id"></label>
                <input wire:model="for_id" type="text" class="form-control" id="for_id" placeholder="For Id">@error('for_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="pel_nombre"></label>
                <input wire:model="pel_nombre" type="text" class="form-control" id="pel_nombre" placeholder="Pel Nombre">@error('pel_nombre') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="pel_costo"></label>
                <input wire:model="pel_costo" type="text" class="form-control" id="pel_costo" placeholder="Pel Costo">@error('pel_costo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="pel_fecha_estreno"></label>
                <input wire:model="pel_fecha_estreno" type="text" class="form-control" id="pel_fecha_estreno" placeholder="Pel Fecha Estreno">@error('pel_fecha_estreno') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>