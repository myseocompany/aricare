<div>
    @if ($selectedPatient)
        <!-- Perfil del Paciente -->
        <button class="mb-4 btn btn-secondary" wire:click="backToList">Volver a la lista</button>
        @livewire('patient-profile-form', ['userId' => $selectedPatient->id])
    @else
        <!-- Búsqueda y Configuración de Paginación -->
        <div class="flex justify-between items-center mb-4">
            <input wire:model.live.debounce.300ms="search" type="text" class="border rounded p-2" placeholder="Buscar..." />
            <select wire:model.live="perPage" class="border rounded p-2">
                <option value="5">5 por página</option>
                <option value="10">10 por página</option>
                <option value="15">15 por página</option>
                <option value="20">20 por página</option>
            </select>
        </div>

        <!-- Tabla de Pacientes -->
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    @foreach($columns as $label)
                        <th class="border p-2 text-left">{{ $label }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr wire:click="selectPatient({{ $item->id }})" class="cursor-pointer hover:bg-gray-100">
                        @foreach(array_keys($columns) as $field)
                            @if ($field === 'next_appointment')
                                <td class="border p-2">
                                    {{ optional($item->appointments->first())->start_time ? \Carbon\Carbon::parse($item->appointments->first()->start_time)->format('Y-m-d H:i') : 'Sin Citas' }}
                                </td>
                            @elseif ($field === 'profile_exists')
                                <td class="border p-2">
                                    {{ $item->profile_exists ? 'Sí' : 'No' }}
                                </td>
                            @else
                                <td class="border p-2">{{ data_get($item, $field) }}</td>
                            @endif
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($columns) }}" class="text-center p-4">No se encontraron resultados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $items->links() }}
        </div>
    @endif
</div>
