    <div class="container mt-3">
        <div>
            {{$patientProfile->id}} - {{$patientProfile->user_id}} -  {{$patientProfile->user->getName()}}
           
        </div>
        <!-- Menú de pestañas arriba -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ $currentTab === 'show' ? 'active' : '' }}" wire:click="setTab('show')">Atención</a>

            </li>
            <li class="nav-item">
                <a class="nav-link {{ $currentTab === 'personal-data' ? 'active' : '' }}" wire:click="setTab('personal-data')">Datos personales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $currentTab === 'address-data' ? 'active' : '' }}" wire:click="setTab('address-data')">Domicilio del paciente</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $currentTab === 'additional-data' ? 'active' : '' }}" wire:click="setTab('additional-data')">Datos adicionales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $currentTab === 'responsible' ? 'active' : '' }}" wire:click="setTab('responsible')">Responsable</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $currentTab === 'companion' ? 'active' : '' }}" wire:click="setTab('companion')">Acompañante</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $currentTab === 'appointments' ? 'active' : '' }}" wire:click="setTab('appointments')">Citas</a>
            </li>
        </ul>

        <!-- Contenido dinámico debajo de las pestañas -->
        <div class="mt-4">
        @if($currentTab === 'show')
            @livewire('patient-profile.show', ['patientProfile' => $patientProfile])
        @elseif ($currentTab === 'personal-data')
            
            <livewire:patient-profile.personal-data :user_id="$userId" />
        @elseif ($currentTab === 'address-data')
            @livewire('patient-profile.address-data', ['patientProfile' => $patientProfile])
        @elseif ($currentTab === 'additional-data')
            @livewire('patient-profile.additional-data', ['patientProfile' => $patientProfile])
        @elseif ($currentTab === 'responsible')
            @livewire('patient-profile.responsible', ['patientProfile' => $patientProfile])
        @elseif ($currentTab === 'companion')
            @livewire('patient-profile.companion', ['patientProfile' => $patientProfile])
        @elseif ($currentTab === 'appointments')
            @livewire('patient-profile.appointments', ['patientProfile' => $patientProfile])

        @endif
        

        </div>
        <style>
            .nav-tabs {
                margin-bottom: 1rem; /* Espacio debajo de las pestañas */
            }
            .nav-link.active {
                font-weight: bold;
                background-color: #e9ecef; /* Color de fondo para la pestaña activa */
            }

        </style>
    </div>
