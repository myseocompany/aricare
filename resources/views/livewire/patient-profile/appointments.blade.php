<div>
    <h3>Listado de Citas</h3>
    @if ($appointments->isEmpty())
        <p>No hay citas pendientes para este paciente.</p>
    @else
        <ul class="list-group">
            @foreach ($appointments as $appointment)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $appointment->reason }}</strong><br>
                        Fecha: {{ $appointment->start_time->format('d/m/Y H:i') }}
                    </div>
                    <a href="{{ route('appointments.attend', $appointment->id) }}" class="btn btn-primary btn-sm">
                        Iniciar Atención
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
