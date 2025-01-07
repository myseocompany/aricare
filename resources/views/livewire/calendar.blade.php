<div>
    
    <!-- Div para el calendario -->
    <div wire:ignore id='calendar' class="w-full"></div>

    <!-- Modal para crear citas -->

<div 
class="modal fade" 
id="createAppointmentModal" 
tabindex="-1" aria-labelledby="createAppointmentModalLabel" 
aria-hidden="true"
>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="createAppointmentModalLabel">Agendar Cita</h5>
                <input type="hidden" name="modal_action" id="modal_action" value="save">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Columna Izquierda -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="patient_id" class="form-label">Paciente</label>
                            <select id="patient_id" name="patient_id" class="form-control">
                                <optione value="">Selecciona un paciente</optione>
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="reason" class="form-label">Motivo de consulta</label>
                            <textarea id="reason" name="reason" class="form-control" rows="3" placeholder="Escribe el motivo"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="type_id" class="form-label">Tipo de Cita</label>
                            <select id="type_id" name="type_id" class="form-control">
                                <optione value="">Selecciona un tipo</optione>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Columna Derecha -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="branch_id" class="form-label">Sede</label>
                            <select id="branch_id" name="branch_id" class="form-control">
                                <optione value="">Selecciona una sede</optione>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="doctor_id" class="form-label">Doctor</label>
                            <select id="doctor_id" name="doctor_id" class="form-control">
                                <optione value="">Selecciona un doctor</optione>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="resource_id" class="form-label">Unidad</label>
                            <select id="resource_id" name="resource_id" class="form-control">
                                <optione value="">Selecciona una unidad</optione>
                                @foreach($resources as $resource)
                                    <option value="{{ $resource->id }}">{{ $resource->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Fecha y Horarios -->
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="appointmentDate" class="form-label">Fecha</label>
                        <input type="date" id="appointmentDate" name="date" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="appointmentTime" class="form-label">Hora de Inicio</label>
                        <input type="time" id="appointmentTime" name="start_time" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="appointmentEndTime" class="form-label">Hora de Fin</label>
                        <input type="time" id="appointmentEndTime" name="end_time" class="form-control">
                    </div>
                </div>

                <!-- Recurrencia (repetir) -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="block_type_id" class="form-label">Repetir</label>
                        <select id="block_type_id" name="block_type_id" class="form-control">
                            <option value="">No repetir</option>
                            @foreach($blockTypes as $blockType)
                                <option value="{{ $blockType->id }}">{{ $blockType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3" id="recurrenceEndWrapper" style="display:none;">
                        <label for="block_end_date" class="form-label">Hasta</label>
                        <input type="date" id="block_end_date" name="block_end_date" class="form-control">
                    </div>
                </div>
                <script>
                    document.getElementById('block_type_id').addEventListener('change', function() {
                        document.getElementById('recurrenceEndWrapper').style.display = this.value ? 'block' : 'none';
                    });
                </script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</div>
</div>

    
</div>

@assets
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/locales-all.min.js"></script>
@endassets

@script
<script>
    document.addEventListener('livewire:initialized', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            locale: 'es',
            firstDay: 1,
            timeZone: 'America/Bogota',
            editable: true,
            selectable: true,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay',
            },
            
            events: @json($events),

            // Al seleccionar un rango de tiempo
            select: function(data) {
                document.getElementById('appointmentDate').value = data.start.toISOString().split('T')[0];
                document.getElementById('appointmentTime').value = data.start.toISOString().split('T')[1].slice(0, 5);
                document.getElementById('appointmentEndTime').value = data.end.toISOString().split('T')[1].slice(0, 5);
                document.getElementById('modal_action').value = "save";
                
                // Restablecer el formulario
    const form = document.querySelector('#createAppointmentModal form');
    form.action = `{{ route('appointments.store') }}`;
    form.method = 'POST';

    // Eliminar el campo _method si existe
    const methodField = document.querySelector('input[name="_method"]');
    if (methodField) {
        methodField.remove();
    }

                $('#createAppointmentModal').modal('show');
            },

            // Al hacer clic en una cita
            eventClick: function(info) {
               
                const appointmentId = info.event.id;
                

                // Llama a un endpoint para obtener los detalles de la cita
                fetch(`/appointments/${appointmentId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data.patient_id);
                        // Llena el formulario con los datos de la cita
                        document.getElementById('patient_id').value = data.patient_id;
                        document.getElementById('doctor_id').value = data.doctor_id;
                        document.getElementById('branch_id').value = data.branch_id;
                        document.getElementById('resource_id').value = data.resource_id;
                        document.getElementById('type_id').value = data.type_id;
                        document.getElementById('reason').value = data.reason;
                        document.getElementById('appointmentDate').value = data.date;
                        document.getElementById('appointmentTime').value = data.start_time;
                        document.getElementById('appointmentEndTime').value = data.end_time;

                        // Cambiar el título del modal y el botón para edición
                        document.getElementById('createAppointmentModalLabel').innerText = 'Editar Cita';
                        document.querySelector('#createAppointmentModal form').action = `/appointments/${appointmentId}`;
                        document.querySelector('#createAppointmentModal form').method = 'POST';
                        document.getElementById('modal_action').value = "edit";
                        const form = document.querySelector('#createAppointmentModal form');
            form.action = `/appointments/${appointmentId}`;
            form.method = 'POST';            
                        // Manejar campo _method para PUT
            let methodField = document.querySelector('input[name="_method"]');
            if (!methodField) {
                methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                form.appendChild(methodField);
            }
            methodField.value = 'PUT';

                        // Mostrar el modal
                        $('#createAppointmentModal').modal('show');
                    });
                    
            },

            // Arrastrar y soltar para cambiar la fecha
            // Arrastrar y soltar para cambiar la fecha/hora
            eventDrop: function(info) {
                const appointmentId = info.event.id;
                const start = info.event.start.toISOString(); // Inicio en formato ISO
                const end = info.event.end ? info.event.end.toISOString() : null; // Fin en formato ISO si existe

                // Llamada al endpoint para actualizar la fecha/hora
                fetch(`/appointments/${appointmentId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Token CSRF para seguridad
                    },
                    body: JSON.stringify({
                        start_time: start,
                        end_time: end,
                        _method: 'PUT', // Método PUT para actualizar
                    }),
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la actualización');
                    }
                    return response.json();
                })
                .then(data => {
                    alert('Cita actualizada exitosamente');
                })
                .catch(error => {
                    console.error('Error al actualizar la cita:', error);
                    alert('Hubo un error al intentar actualizar la cita');
                    info.revert(); // Revertir el cambio en el calendario si falla
                });
            },

        });

        calendar.render();
    });


    document.addEventListener('closeModal', function() {
        $('#createAppointmentModal').modal('hide');
    });

    Livewire.on('refreshCalendar', () => {
        location.reload(); // Refresca el calendario al actualizar citas
    });
</script>

@endscript
