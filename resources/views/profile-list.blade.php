<tbody>
    @forelse ($items as $item)
        <tr>
            @foreach(array_keys($columns) as $field)
                <td class="border p-2">
                    @if(str_contains($field, '.')) <!-- Si el campo pertenece a una relación -->
                        {{ data_get($item, $field) }}
                    @else
                        {{ $item->$field }}
                    @endif
                </td>
            @endforeach
        </tr>
    @empty
        <tr>
            <td colspan="{{ count($columns) }}" class="text-center p-4">No se encontraron resultados.</td>
        </tr>
    @endforelse
</tbody>
