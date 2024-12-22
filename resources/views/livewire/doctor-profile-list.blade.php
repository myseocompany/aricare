<div>
    <div class="flex justify-between items-center mb-4">
        <input wire:model.debounce.300ms="search" type="text" class="border rounded p-2" placeholder="Buscar..." />
        <select wire:model="perPage" class="border rounded p-2">
            <option value="5">5 por página</option>
            <option value="10">10 por página</option>
            <option value="15">15 por página</option>
            <option value="20">20 por página</option>
        </select>
    </div>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100">
                @foreach($columns as $label)
                    <th class="border p-2">{{ $label }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    @foreach(array_keys($columns) as $field)
                        <td class="border p-2">{{ data_get($item, $field) }}</td>
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($columns) }}" class="text-center p-4">No se encontraron resultados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $items->links() }}
    </div>
</div>
