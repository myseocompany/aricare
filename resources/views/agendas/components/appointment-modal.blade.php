
<div 
    class="modal fade" 
    id="createAppointmentModal" 
    tabindex="-1" aria-labelledby="createAppointmentModalLabel" 
    aria-hidden="true"
    style="{{ $isModalOpen ? 'display: block;' : 'display: none;' }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('appointments.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createAppointmentModalLabel">Agendar Cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Columna Izquierda -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="patient_id" class="form-label">Paciente</label>
                                <select id="patient_id" name="patient_id" class="form-control">
                                    <option value="">Selecciona un paciente</option>
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
                                    <option value="">Selecciona un tipo</option>
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
                                    <option value="">Selecciona una sede</option>
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="doctor_id" class="form-label">Doctor</label>
                                <select id="doctor_id" name="doctor_id" class="form-control">
                                    <option value="">Selecciona un doctor</option>
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="resource_id" class="form-label">Unidad</label>
                                <select id="resource_id" name="resource_id" class="form-control">
                                    <option value="">Selecciona una unidad</option>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
