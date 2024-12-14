<div class="container mx-auto py-6 px-4">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Lista de Empresas</h2>

    <!-- Barra de búsqueda -->
    <div class="mb-4 flex justify-between items-center">
        <input
            type="text"
            wire:model="search"
            class="w-1/3 border border-gray-300 p-2 rounded"
            placeholder="Buscar empresa por nombre o teléfono"
        />

        <select wire:model="perPage" class="w-1/6 border border-gray-300 p-2 rounded">
            <option value="5">5 por página</option>
            <option value="10">10 por página</option>
            <option value="15">15 por página</option>
            <option value="20">20 por página</option>
        </select>
    </div>

    <!-- Tabla de empresas -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-4">Nombre</th>
                    <th class="py-3 px-4">Tipo</th>
                    <th class="py-3 px-4">Teléfono</th>
                    <th class="py-3 px-4">País</th>
                    <th class="py-3 px-4">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse ($companies as $company)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-4">{{ $company->company_name }}</td>
                        <td class="py-3 px-4">{{ ucfirst($company->company_type) }}</td>
                        <td class="py-3 px-4">{{ $company->phone }}</td>
                        <td class="py-3 px-4">{{ $company->country->name ?? 'N/A' }}</td>
                        <td class="py-3 px-4">
                            <a href="{{ route('company-profile.edit', $company->id) }}" class="text-blue-500 hover:underline">Editar</a>
                            <button
                                wire:click="$emit('deleteCompany', {{ $company->id }})"
                                class="text-red-500 hover:underline ml-4"
                            >
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-3 px-4 text-center text-gray-500">No se encontraron empresas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $companies->links() }}
    </div>
</div>
