<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Actor Pelicula</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                <label for="act_id"></label>
                <select wire:model="act_id" name="act_id" id="act_id" class="form-control">
                    @foreach($actores as $act_id=>$act_nombre)
							<option value="{{$act_id}}">{{$act_nombre}}</option>
					@endforeach
                </select>@error('act_id') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <label for="apl_papel"></label>
                <input wire:model="apl_papel" type="text" class="form-control" id="apl_papel" placeholder="Apl Papel">@error('apl_papel') <span class="error text-danger">{{ $message }}</span> @enderror
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
