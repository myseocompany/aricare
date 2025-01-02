<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save">
        <!-- Grupo: Datos Personales -->
        <h4>Datos Personales</h4>
        <div class="row">
            <!-- Nombre Completo -->
            <div class="col-md-3 mb-3">
                <label for="name" class="form-label">Nombre Completo</label>
                <input type="text" id="name" class="form-control" wire:model.live="patient.name"  value="{{ $userName }}">
                @error('patient.name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Tipo de Documento -->
            <div class="col-md-3 mb-3">
                <label for="document_type_id" class="form-label">Tipo de Documento</label>
                <select id="document_type_id" class="form-select" wire:model="patient.document_type_id">
                    <option value="">Selecciona</option>
                    
                    @foreach ($documentTypeOptions as $id => $value)
                        <option value="{{ $id }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('patient.document_type_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Número de Documento -->
            <div class="col-md-3 mb-3">
                <label for="document_id" class="form-label">Número de Documento</label>
                <input type="text" id="document_id" class="form-control" wire:model="patient.document_id">
                @error('patient.document_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

             <!-- Género -->
    <div class="col-md-3 mb-3">
        <label for="gender" class="form-label">Género</label>
        <select id="gender" class="form-select" wire:model="patient.gender_id">
            <option value="">Selecciona</option>
            @foreach ($genderOptions as $id => $value)
                <option value="{{ $id }}">{{ $value }}</option>
            @endforeach
        </select>
        @error('patient.gender_id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <!-- Tipo de Sangre -->
    <div class="col-md-3 mb-3">
        <label for="blood_type" class="form-label">Tipo de Sangre</label>
        <select id="blood_type" class="form-select" wire:model="patient.blood_type_id">
            <option value="">Selecciona</option>
            @foreach ($bloodTypeOptions as $id => $value)
                <option value="{{ $id }}">{{ $value }}</option>
            @endforeach
        </select>
        @error('patient.blood_type_id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="col-md-3 mb-3">
        <label for="birth_day" class="form-label">Fecha de nacimiento</label>
        <select id="birth_day" class="form-select" wire:model="patient.birth_day">
            <option value="">Selecciona</option>
            @foreach ($bloodTypeOptions as $id => $value)
                <option value="{{ $id }}">{{ $value }}</option>
            @endforeach
        </select>
        @error('patient.birth_day') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
        </div>

        <!-- Grupo: Ubicación -->
        <h4>Ubicación</h4>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="country_id" class="form-label">País de Nacimiento</label>
                <select id="country_id" class="form-select" wire:model="selectedCountry">
                    <option value="">Selecciona</option>
                    @foreach ($countryOptions as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="city_of_birth" class="form-label">Ciudad de Nacimiento</label>
                <select id="city_of_birth" class="form-select" wire:model="patient.city_of_birth">
                    <option value="">Selecciona</option>
                    @foreach ($cityOptions as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Grupo: Datos Adicionales -->
        <h4>Datos Adicionales</h4>
        <div class="row">
            <!-- Estado Civil -->
            <div class="col-md-6 mb-3">
                <label for="civil_status_id" class="form-label">Estado Civil</label>
                <select id="civil_status_id" class="form-select" wire:model="patient.civil_status_id">
                    <option value="">Selecciona</option>
                    @foreach ($civilStatusOptions as $id => $value)
                        <option value="{{ $id }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Ocupación -->
            <div class="col-md-6 mb-3">
                <label for="occupation_id" class="form-label">Ocupación</label>
                <select id="occupation_id" class="form-select" wire:model="patient.occupation_id">
                    <option value="">Selecciona</option>
                    @foreach ($occupationOptions as $id => $value)
                        <option value="{{ $id }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <!-- EPS -->
            <div class="col-md-6 mb-3">
                <label for="insurance_id" class="form-label">EPS</label>
                <select id="insurance_id" class="form-select" wire:model="patient.insurance_id">
                    <option value="">Selecciona</option>
                    @foreach ($insuranceOptions as $id => $value)
                        <option value="{{ $id }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Clasificación de Riesgo -->
            <div class="col-md-6 mb-3">
                <label for="risk_level_id" class="form-label">Clasificación de Riesgo</label>
                <select id="risk_level_id" class="form-select" wire:model="patient.risk_level_id">
                    <option value="">Selecciona</option>
                    @foreach ($riskLevelOptions as $id => $value)
                        <option value="{{ $id }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
