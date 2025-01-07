<x-app-layout>
    <div class="container mx-auto p-6">
        <!-- Fila 1: Información del Paciente -->
        <div class="grid grid-cols-3 gap-6 items-center mb-4">
            <!-- Nombre -->
            <div>
                <p class="font-semibold">Nombre</p>
                <p>{{ $appointment->patient->name }}</p>
            </div>
            
            <!-- Número de Historia -->
            <div>
                <p class="font-semibold"># Historia</p>
                <p>{{ $appointment->id }}</p> <!-- Puedes cambiar a document_id si prefieres -->
            </div>
            
            <!-- Fecha -->
            <div>
                <p class="font-semibold">Fecha</p>
                <p>{{ \Carbon\Carbon::parse($appointment->start_time)->format('d/m/Y') }}</p>
            </div>
        </div>

        <!-- Fila 2: Notas Clínicas -->
        <div class="mb-4">
            <p class="font-semibold mb-2">Notas</p>
            <textarea 
                class="w-full border rounded-lg p-2 focus:outline-none focus:ring focus:border-blue-300"
                rows="5"
                placeholder="Escribe aquí las notas clínicas..."
                wire:model.defer="clinical_notes"
            ></textarea>
        </div>

        <!-- Fila 3: Botón Guardar -->
        <div class="text-right">
            <button 
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300"
                wire:click="saveNotes"
            >
                Guardar
            </button>
        </div>
    </div>
</x-app-layout>
