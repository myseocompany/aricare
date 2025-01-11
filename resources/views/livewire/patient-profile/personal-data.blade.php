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
            <div class="col-md-3 mb-3">
                <label for="first_name">Primer Nombre</label>
                <input type="text" id="first_name" wire:model.live="first_name" class="form-control">
                @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-3 mb-3">
                <label for="middle_name">Segundo Nombre</label>
                <input type="text" id="middle_name" wire:model.live="middle_name" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="last_name">Primer Apellido</label>
                <input type="text" id="last_name" wire:model.live="last_name" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="second_last_name">Segundo Apellido</label>
                <input type="text" id="second_last_name" wire:model.live="second_last_name" class="form-control">
            </div>

            <!-- Tipo de Documento -->
            <div class="col-md-3 mb-3">
                <label for="document_type_id" class="form-label">Tipo de Documento</label>
                <select id="document_type_id" class="form-select" wire:model.live="document_type_id">
                    <option value="">Selecciona</option>
                    @foreach ($documentTypeOptions as $id => $value)
                        <option value="{{ $id }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('document_type_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Número de Documento -->
            <div class="col-md-3 mb-3">
                <label for="document_id" class="form-label">Número de Documento</label>
                <input type="text" id="document_id" class="form-control" wire:model.live="document_id">
                @error('document_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Género -->
            <div class="col-md-3 mb-3">
                <label for="gender_id">Género</label>
                <select id="gender_id" class="form-select" wire:model.live="gender_id">
                    <option value="">Selecciona</option>
                    @foreach ($genderOptions as $id => $value)
                        <option value="{{ $id }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('gender_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Tipo de Sangre -->
            <div class="col-md-3 mb-3">
                <label for="blood_type_id">Tipo de Sangre</label>
                <select id="blood_type_id" class="form-select" wire:model.live="blood_type_id">
                    <option value="">Selecciona</option>
                    @foreach ($bloodTypeOptions as $id => $value)
                        <option value="{{ $id }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('blood_type_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="col-md-3 mb-3">
                <label for="birth_date">Fecha de Nacimiento</label>
                <input type="date" id="birth_date" class="form-control" wire:model.live="birth_date">
                @error('birth_date') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Grupo: Ubicación -->
        <h4>Ubicación</h4>
        <div class="row">
            <!-- Selección de País -->
            <div class="col-md-3 mb-3">
                <label for="country_id" class="form-label">País de Nacimiento</label>
                <select id="country_id" class="form-select" wire:model.live="selectedCountry">
                    <option value="">Selecciona</option>
                    @foreach ($countryOptions as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Selección de División -->
            <div class="col-md-3 mb-3">
                <label for="division_id" class="form-label">División</label>
                <select id="division_id" class="form-select" wire:model.live="selectedDivision">
                    <option value="">Selecciona</option>
                    @foreach ($divisionOptions as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Selección de Ciudad -->
            <div class="col-md-3 mb-3">
                <label for="city_id" class="form-label">Ciudad</label>
                <select id="city_id" class="form-select" wire:model.live="city_of_birth">
                    <option value="">Selecciona</option>
                    @foreach ($cityOptions as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-3 mb-3">
                <label for="nationality">Nacionalidad</label>
                <input type="text" id="nationality" class="form-control" wire:model.live="nationality">
                @error('nationality') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Estado -->
            <div class="col-md-3 mb-3">
                <label for="is_active">Estado</label>
                <select id="is_active" class="form-select" wire:model.live="is_active">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
                @error('is_active') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Grupo: Datos Adicionales -->
        <h4>Datos Adicionales</h4>
        <div class="row">
            <!-- Estado Civil -->
            <div class="col-md-3 mb-3">
                <label for="civil_status_id">Estado Civil</label>
                <select id="civil_status_id" class="form-select" wire:model.live="civil_status_id">
                    <option value="">Selecciona</option>
                    @foreach ($civilStatusOptions as $id => $value)
                        <option value="{{ $id }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Ocupación -->
            <div class="col-md-3 mb-3">
                <label for="occupation">Ocupación</label>
                <input type="text" id="occupation" class="form-control" wire:model.live="occupation">
                @error('occupation') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- EPS -->
            <div class="col-md-3 mb-3">
                <label for="insurance_id">EPS</label>
                <select id="insurance_id" class="form-select" wire:model.live="insurance_id">
                    <option value="">Selecciona</option>
                    @foreach ($insuranceOptions as $id => $value)
                        <option value="{{ $id }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Clasificación de Riesgo -->
            <div class="col-md-3 mb-3">
                <label for="risk_level_id">Clasificación de Riesgo</label>
                <select id="risk_level_id" class="form-select" wire:model.live="risk_level_id">
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
