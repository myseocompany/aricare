<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save">
        <!-- Grupo: Datos Personales -->
        <h4>Datos Personales</h4>
        <div>{{$patientProfile->user_id}}
          
             <input type="text" id="user_id" wire:model.defer="patientProfile.user_id" class="form-control" value="test"  >
        </div>
        <div class="row">
            <!-- Nombre Completo -->
            <div>
                <label for="first_name">Primer Nombre</label>
                <input type="text" id="first_name" wire:model.live="patientProfile.first_name" class="form-control">
                @error('patientProfile.first_name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="col-md-3 mb-3">
                <label for="middle_name">Segundo Nombre</label>
                <input type="text" id="middle_name" wire:model.live="patientProfile.middle_name" class="form-control">
            </div>
            <div class="col-md-3 mb-3">
                <label for="last_name">Primer Apellido</label>
                <input type="text" id="last_name" wire:model.live="patientProfile.last_name" class="form-control">
            </div>
            <div class="col-md-3 mb-3">
                <label for="second_last_name">Segundo Apellido</label>
                <input type="text" id="second_last_name" wire:model.live="patientProfile.second_last_name" class="form-control">
            </div>
            

            <!-- Tipo de Documento -->
            <div class="col-md-3 mb-3">
                <label for="document_type_id" class="form-label">Tipo de Documento</label>
                <select id="document_type_id" class="form-select" wire:model.live="patientProfile.document_type_id">
                    <option value="">Selecciona</option>
                    
                    @foreach ($documentTypeOptions as $id => $value)
                        <option value="{{ $id }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('patientProfile.document_type_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Número de Documento -->
            <div class="col-md-3 mb-3">
                <label for="document_id" class="form-label">Número de Documento</label>
                <input type="text" id="document_id" class="form-control" wire:model.live="patientProfile.document_id">
                @error('patientProfile.document_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

             <!-- Género -->
    <div class="col-md-3 mb-3">
        <label for="gender" class="form-label">Género</label>
        <select id="gender" class="form-select" wire:model.live="patientProfile.gender_id">
            <option value="">Selecciona</option>
            @foreach ($genderOptions as $id => $value)
                <option value="{{ $id }}">{{ $value }}</option>
            @endforeach
        </select>
        @error('patientProfile.gender_id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <!-- Tipo de Sangre -->
    <div class="col-md-3 mb-3">
        <label for="blood_type" class="form-label">Tipo de Sangre</label>
        <select id="blood_type" class="form-select" wire:model.live="patientProfile.blood_type_id">
            <option value="">Selecciona</option>
            @foreach ($bloodTypeOptions as $id => $value)
                <option value="{{ $id }}">{{ $value }}</option>
            @endforeach
        </select>
        @error('patientProfile.blood_type_id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="col-md-3 mb-3">
        <label for="birth_date" class="form-label">Fecha de nacimiento</label>
        <input type="date" id="birth_date" class="form-control" wire:model.live="patientProfile.birth_date">
        @error('patientProfile.birth_date') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    
        </div>

        <!-- Grupo: Ubicación -->
        <h4>Ubicación</h4>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="country_id" class="form-label">País de Nacimiento</label>
                <select id="country_id" class="form-select" wire:model.live="selectedCountry">
                    <option value="">Selecciona</option>
                    @foreach ($countryOptions as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 mb-3">
                <label for="city_of_birth" class="form-label">Ciudad de Nacimiento</label>
                <select id="city_of_birth" class="form-select" wire:model.live="patientProfile.city_of_birth">
                    <option value="">Selecciona</option>
                    @foreach ($cityOptions as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Nacionalidad -->
            <div class="col-md-3 mb-3">
                <label for="nationality" class="form-label">Nacionalidad</label>
                <input type="text" id="nationality" class="form-control" wire:model.live="patientProfile.nationality">
                @error('patientProfile.nationality') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Clasificación (Activo/Inactivo) -->
            <div class="col-md-3 mb-3">
                <label for="is_active" class="form-label">Estado</label>
                <select id="is_active" class="form-select" wire:model.live="patientProfile.is_active">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
                @error('patientProfile.is_active') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

        </div>

        <!-- Grupo: Datos Adicionales -->
        <h4>Datos Adicionales</h4>
        <div class="row">
            <!-- Estado Civil -->
            <div class="col-md-3 mb-3">
                <label for="civil_status_id" class="form-label">Estado Civil</label>
                <select id="civil_status_id" class="form-select" wire:model.live="patientProfile.civil_status_id">
                    <option value="">Selecciona</option>
                    @foreach ($civilStatusOptions as $id => $value)
                        <option value="{{ $id }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Ocupación -->
            <div class="col-md-3 mb-3">
                <label for="occupation" class="form-label">Ocupación</label>
                <input type="text" id="occupation" class="form-control" wire:model.live="patientProfile.occupation">
                @error('patientProfile.occupation') <span class="text-danger">{{ $message }}</span> @enderror
            </div>


            <!-- EPS -->
            <div class="col-md-3 mb-3">
                <label for="insurance_id" class="form-label">EPS</label>
                <select id="insurance_id" class="form-select" wire:model.live="patientProfile.insurance_id">
                    <option value="">Selecciona</option>
                    @foreach ($insuranceOptions as $id => $value)
                        <option value="{{ $id }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Clasificación de Riesgo -->
            <div class="col-md-3 mb-3">
                <label for="risk_level_id" class="form-label">Clasificación de Riesgo</label>
                <select id="risk_level_id" class="form-select" wire:model.live="patientProfile.risk_level_id">
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
