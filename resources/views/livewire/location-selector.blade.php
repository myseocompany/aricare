<div>
    <div class="mb-4">
        <label for="country" class="block">País</label>
        <select wire:model.live="selectedCountry" id="country" class="w-full border p-2 mt-1">
            <option value="">Seleccione un país</option>
            @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="division" class="block">División</label>
        <select wire:model.live="selectedDivision" id="division" class="w-full border p-2 mt-1" {{ empty($divisions) ? 'disabled' : '' }}>
            <option value="">Seleccione una división</option>
            @foreach($divisions as $division)
                <option value="{{ $division->id }}">{{ $division->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="city" class="block">Ciudad</label>
        <select wire:model.live="selectedCity" id="city" class="w-full border p-2 mt-1" {{ empty($cities) ? 'disabled' : '' }}>
            <option value="">Seleccione una ciudad</option>
            @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
    </div>
</div>
