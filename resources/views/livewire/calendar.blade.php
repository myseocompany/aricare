<div>
   
<!-- Botón para abrir el modal -->


<div wire:ignore id='calendar' class="w-full"></div>

<!-- Modal -->
<div class="modal fade" id="createAppointmentModal" tabindex="-1" aria-labelledby="createAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form >
                <div class="modal-header">
                    <h5 class="modal-title" id="createAppointmentModalLabel">Agendar Cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="appointmentDate" class="form-label">Fecha</label>
                            <input type="date" id="appointmentDate" class="form-control" wire:model.defer="appointment.date">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="appointmentTime" class="form-label">Hora</label>
                            <input type="time" id="appointmentTime" class="form-control" wire:model.defer="appointment.time">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="patientName" class="form-label">Paciente</label>
                            <input type="text" id="patientName" class="form-control" wire:model.defer="appointment.patient" placeholder="Nombre del paciente">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="reason" class="form-label">Motivo de consulta</label>
                            <textarea id="reason" class="form-control" wire:model.defer="appointment.reason" rows="3" placeholder="Escribe el motivo"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button wire:click.prevent="saveAppointment" type="submit" class="btn btn-primary">Guardar</button>
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
    
   // $(document).ready(function(){
        document.addEventListener('livewire:initialized', function(){
            console.log(@json($events));
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek', // Vista semanal
                locale: 'es', // Idioma español
                firstDay: 1, 
                editable: true,
                selectable: true,
                headerToolbar: {
                    left: 'prev,next today', // Botones de navegación
                    center: 'title', // Título en el centro
                    right: 'dayGridMonth,timeGridWeek,timeGridDay', // Cambiar entre vistas
                },
                events: @json($events),
                select: function(data) {
                    var event_name = prompt('Event Name:');
                    if (!event_name) {
                        return;
                    }
                    @this.newEvent(event_name, data.start.toISOString(), data.end.toISOString())
                        .then(
                            function(id) {
                                console.log("Evento creado con ID:", id);
                                calendar.addEvent({
                                    id: id,
                                    title: event_name,
                                    start: data.startStr,
                                    end: data.endStr,
                                });
                                calendar.unselect();
                            });
                },
                eventDrop: function(data) {
                    console.log(data.event.id)
                    @this.updateEvent(
                        data.event.id,
                        data.event.name,
                        data.event.start.toISOString(),
                        data.event.end.toISOString()).then(function() {
                        alert('moved event');
                    })
                },
                views: {
                    dayGridMonth: { // Vista de Mes
                        buttonText: 'Mes'
                    },
                    timeGridWeek: { // Vista de Semana
                        buttonText: 'Semana'
                    },
                    timeGridDay: { // Vista de Día
                        buttonText: 'Día'
                    }
                },
                
            });

            calendar.render();
            

        
    });
   
    
    document.addEventListener('closeModal', function (event) {
        console.log("close");
        var modal = bootstrap.Modal.getInstance(document.getElementById(event.detail.modalId));
        modal.hide();
    });

    const myModalEl = document.getElementById('createAppointmentModal')
        myModalEl.addEventListener('hidden.bs.modal', event => {
            console.log("close");
        })



    document.addEventListener('livewire:load', function() {
    const calendarEl = document.getElementById('calendar');
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        events: '/api/appointments', // API para cargar citas
    });

    calendar.render();

    Livewire.on('refreshCalendar', () => {
        calendar.refetchEvents(); // Recarga las citas
    });
});

</script>
@endscript