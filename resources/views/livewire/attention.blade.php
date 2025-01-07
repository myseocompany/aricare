<div>
    <h2>Atención para la Cita</h2>

    <form wire:submit.prevent="saveAttention">
        <div>
            <label for="clinicalNotes">Notas Clínicas</label>
            <textarea id="clinicalNotes" wire:model="clinicalNotes" class="form-control"></textarea>
        </div>

        <div>
            <label for="isCompleted">¿Atención Completada?</label>
            <input type="checkbox" id="isCompleted" wire:model="isCompleted">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</div>
