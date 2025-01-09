<div class="">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Nombre Completo -->
        <div>
            <p><span class="font-semibold">Nombre Completo:</span> {{ $patientProfile->id }}-{{ $patientProfile->name }}</p>
        </div>
        <!-- Tipo y Número de Documento -->
        <div>
            <p><span class="font-semibold">Documento:</span> {{ $patientProfile->document_type }} {{ $patientProfile->document_id }}</p>
        </div>
        <!-- Edad -->
        <div>
            <p><span class="font-semibold">Edad:</span> {{ $patientProfile->age }} años</p>
        </div>
        <!-- Género -->
        <div>
            <p><span class="font-semibold">Género:</span> {{ $patientProfile->gender }}</p>
        </div>
        <!-- Email -->
        <div>
            <p><span class="font-semibold">Email:</span> {{ $patientProfile->email }}</p>
        </div>
        <!-- Teléfono -->
        <div>
            <p><span class="font-semibold">Teléfono:</span> {{ $patientProfile->phone }}</p>
        </div>
        <!-- Tipo de Sangre -->
        <div>
            <p><span class="font-semibold">Tipo de Sangre:</span> {{ $patientProfile->blood_type }}</p>
        </div>
        <!-- Clasificación de Riesgo -->
        <div>
            <p><span class="font-semibold">Clasificación de Riesgo:</span> {{ $patientProfile->risk_level }}</p>
        </div>
        <!-- Referido por -->
        <div>
            <p><span class="font-semibold">Referido por:</span> {{ $patientProfile->referred_by }}</p>
        </div>
    </div>
    <!-- Botón para Apertura de Historia Clínica -->
    <div class="mt-6 text-center">
        <button class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
            Apertura de Historia Clínica
        </button>
    </div>
</div>
