<div class="main-container w-full flex flex-col justify-center items-center bg-gray-100">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="info-container w-full sm:w-3/4 lg:w-2/3 bg-white shadow-md rounded-lg p-6">
        <form wire:submit.prevent="submit" class="w-full flex flex-wrap">
            <!-- Primera sección: Información Básica -->
            <div class="w-full px-2 mb-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Información Básica</h2>
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full sm:w-1/2 px-2 mb-4">
                        <label for="company_type_id">Tipo de empresa:</label>
                        <select wire:model.live="selectedCompanyType" class="w-full border border-gray-300 p-2 rounded">
                            <option value="" disabled selected>Seleccione el tipo de empresa</option>
                            @foreach ($companyTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full sm:w-1/2 px-2 mb-4">
                        <label for="company_name">Nombre de la empresa:</label>
                        
                        <input wire:model.live="company_name" type="text" class="w-full border border-gray-300 p-2 rounded" placeholder="Nombre de la empresa" />
                    </div>
                </div>
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full sm:w-1/2 px-2 mb-4">
                        <label for="employee_range_id">Número de colaboradores:</label>
                        <select wire:model="selectedEmployeeRange" class="w-full border border-gray-300 p-2 rounded">
                            <option value="" disabled selected>Seleccione el rango de empleados</option>
                            @foreach ($employeeRanges as $range)
                                <option value="{{ $range->id }}">{{ $range->range }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="w-full sm:w-1/2 px-2 mb-4">
                        <label for="phone">Teléfono de la empresa:</label>
                        
                        <input wire:model.live="phone" type="tel" class="w-full border border-gray-300 p-2 rounded" placeholder="Número telefónico" />
                    </div>
                </div>
            </div>

<!-- Segunda sección: Ubicación -->
<div class="w-full px-2 mb-4">
    <h2 class="text-lg font-semibold text-gray-700 mb-2">Ubicación</h2>
    <div class="mb-4">
        <label for="division_id">Departamento:</label>
        <select wire:model.live="selectedDivision" class="w-full border border-gray-300 p-2 rounded">
            <option value="" selected>Seleccione un departamento</option>
            @foreach($divisions as $division)
                <option value="{{ $division->id }}">{{ $division->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label for="city_id">Ciudad:</label>
        <select wire:model.live="selectedCity" class="w-full border border-gray-300 p-2 rounded" {{ empty($cities) ? 'disabled' : '' }}>
            <option value="" selected>Seleccione una ciudad</option>
            @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label for="address">Dirección:</label>
        <input wire:model="address" type="text" class="w-full border border-gray-300 p-2 rounded" placeholder="Dirección completa" />
    </div>
</div>


            <!-- Botón Guardar -->
            <div class="w-full flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Guardar</button>
            </div>
        </form>
    </div>
</div>
