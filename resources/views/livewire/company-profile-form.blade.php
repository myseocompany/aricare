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
                        <select wire:model.live="company_type" class="w-full border border-gray-300 p-2 rounded">
                            <option value="" disabled selected>Tipo de empresa</option>
                            <option value="medical">Consultorio médico</option>
                            <option value="dental">Consultorio dental</option>
                            <option value="pharmacy">Farmacia</option>
                            <option value="other">Otros</option>
                        </select>
                    </div>
                    <div class="w-full sm:w-1/2 px-2 mb-4">
                        <input wire:model.live="company_name" type="text" class="w-full border border-gray-300 p-2 rounded" placeholder="Nombre de la empresa" />
                    </div>
                </div>
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full sm:w-1/2 px-2 mb-4">
                        <select wire:model.live="employee_number" class="w-full border border-gray-300 p-2 rounded">
                            <option value="" disabled selected>Número de colaboradores</option>
                            <option value="1-5">1 - 5</option>
                            <option value="6-10">6 - 10</option>
                            <option value="11-20">11 - 20</option>
                            <option value="21-50">21 - 50</option>
                            <option value="50+">Más de 50</option>
                        </select>
                    </div>
                    <div class="w-full sm:w-1/2 px-2 mb-4">
                        <input wire:model.live="phone" type="tel" class="w-full border border-gray-300 p-2 rounded" placeholder="Número telefónico" />
                    </div>
                </div>
            </div>

            <!-- Segunda sección: Ubicación -->
            <div class="w-full px-2 mb-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Ubicación</h2>
                <div class="mb-4">
                    <select wire:model.live="selectedCountry" class="w-full border border-gray-300 p-2 rounded">
                        <option value="" selected>Seleccione un país</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <select wire:model.live="selectedDivision" class="w-full border border-gray-300 p-2 rounded" {{ empty($divisions) ? 'disabled' : '' }}>
                        <option value="" selected>Seleccione una división</option>
                        @foreach($divisions as $division)
                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <select wire:model.live="selectedCity" class="w-full border border-gray-300 p-2 rounded" {{ empty($cities) ? 'disabled' : '' }}>
                        <option value="" selected>Seleccione una ciudad</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <input wire:model.live="address" type="text" class="w-full border border-gray-300 p-2 rounded" placeholder="Dirección completa" />
                </div>
            </div>

            <!-- Botón Guardar -->
            <div class="w-full flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Guardar</button>
            </div>
        </form>
    </div>
</div>
