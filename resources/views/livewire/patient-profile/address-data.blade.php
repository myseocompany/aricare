<div>
    <form wire:submit.prevent="save">
        <div class="mb-3">
            <label for="street" class="form-label">Calle</label>
            <input type="text" id="street" class="form-control" wire:model="address.street">
            @error('address.street') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Ciudad</label>
            <input type="text" id="city" class="form-control" wire:model="address.city">
            @error('address.city') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
