<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AppointmentController extends Controller
{
    /**
     * Guarda una nueva cita en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
{

    
    // Validar los datos enviados desde el formulario
    $validated = $request->merge([
        'date' => trim($request->input('date')),
        'block_end_date' => trim($request->input('block_end_date')),
    ])->validate([
        'date' => 'required|date',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'nullable|date_format:H:i',
        'patient_id' => 'required|exists:users,id',
        'doctor_id' => 'required|exists:users,id',
        'branch_id' => 'required|exists:branches,id',
        'resource_id' => 'required|exists:resources,id',
        'reason' => 'nullable|string',
        'type_id' => 'nullable|exists:appointment_types,id',
        'block_type_id' => 'nullable|exists:block_types,id',
        'block_end_date' => 'nullable|date|after_or_equal:date',
    ]);
    
    // Obtener el team_id relacionado con la sucursal
    $team = Branch::find($validated['branch_id']);
    $teamId = $team ? $team->team_id : null;

    // Asignar valores predeterminados si faltan campos
    $validated['block_type_id'] = $validated['block_type_id'] ?? null;
    $validated['block_end_date'] = $validated['block_end_date'] ?? null;

    
    // Crear una nueva cita con los datos validados
    Appointment::create([
        'start_time' => $validated['date'] . ' ' . $validated['start_time'], // Combinar fecha y hora de inicio
        'end_time' => $validated['end_time'] ? $validated['date'] . ' ' . $validated['end_time'] : null, // Combinar fecha y hora de fin
        'patient_id' => $validated['patient_id'],
        'doctor_id' => $validated['doctor_id'],
        'team_id' => $teamId, // Asociar el team_id derivado de la sucursal
        'branch_id' => $validated['branch_id'],
        'resource_id' => $validated['resource_id'],
        'reason' => $validated['reason'] ?? null,
        'type_id' => $validated['type_id'] ?? null,
        'block_type_id' => $validated['block_type_id'], // Tipo de bloqueo (diario, semanal, mensual)
        'block_end_date' => $validated['block_end_date'], // Fecha final del bloqueo
    ]);

    // Redirigir con un mensaje de éxito
    return redirect()->back()->with('success', 'Cita creada exitosamente.');
}


    /**
     * Muestra los detalles de una cita específica.
     *
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Appointment $appointment)
    {
        return response()->json([
            'id' => $appointment->id,
            'patient_id' => $appointment->patient_id,
            'doctor_id' => $appointment->doctor_id,
            'branch_id' => $appointment->branch_id,
            'resource_id' => $appointment->resource_id,
            'type_id' => $appointment->type_id,
            'reason' => $appointment->reason,
            'date' => $appointment->start_time ? $appointment->start_time->format('Y-m-d') : null,
            'start_time' => $appointment->start_time ? $appointment->start_time->format('H:i') : null,
            'end_time' => $appointment->end_time ? $appointment->end_time->format('H:i') : null,
            'block_type_id' => $appointment->block_type_id, // Tipo de bloqueo
            'block_end_date' => $appointment->block_end_date, // Fecha final del bloqueo
        ]);
    }

    /**
     * Actualiza una cita existente.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Appointment $appointment)
    {
        // Verificar si la solicitud proviene de drag-and-drop o modal
        if ($request->has('start_time') && $request->has('end_time') && !$request->has('date')) {
            // Actualización de drag-and-drop
            $validated = $request->validate([
                'start_time' => 'required|date',
                'end_time' => 'nullable|date',
            ]);

            $appointment->update([
                'start_time' => $validated['start_time'],
                'end_time' => $validated['end_time'],
            ]);

            return response()->json(['message' => 'Cita actualizada exitosamente']);
        }

        // Validar datos para el formulario modal
        $validated = $request->validate([
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i',
            'patient_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:users,id',
            'branch_id' => 'required|exists:branches,id',
            'resource_id' => 'required|exists:resources,id',
            'reason' => 'nullable|string',
            'type_id' => 'nullable|exists:appointment_types,id',
            'block_type_id' => 'nullable|exists:block_types,id', // Validación para el tipo de bloqueo
            'block_end_date' => 'nullable|date|after_or_equal:date', // Validación para la fecha de fin del bloqueo
        ]);

        $appointment->update([
            'start_time' => $validated['date'] . ' ' . $validated['start_time'],
            'end_time' => $validated['end_time'] ? $validated['date'] . ' ' . $validated['end_time'] : null,
            'patient_id' => $validated['patient_id'],
            'doctor_id' => $validated['doctor_id'],
            'branch_id' => $validated['branch_id'],
            'resource_id' => $validated['resource_id'],
            'reason' => $validated['reason'] ?? null,
            'type_id' => $validated['type_id'] ?? null,
            'block_type_id' => $validated['block_type_id'], // Tipo de bloqueo (diario, semanal, mensual)
            'block_end_date' => $validated['block_end_date'], // Fecha final del bloqueo
        ]);

        return redirect()->back()->with(['message' => 'Cita actualizada exitosamente']);
    }

    public function events(Request $request)
    {
        $startDate = $request->query('start', now()->startOfMonth()->toDateString());
        $endDate = $request->query('end', now()->endOfMonth()->toDateString());

        $appointments = Appointment::whereBetween('start_time', [$startDate, $endDate])
            ->get()
            ->map(function ($appointment) {
                $event = [
                    'id' => $appointment->id,
                    'title' => $appointment->patient->name ?? 'Sin nombre',
                    'start' => $appointment->start_time,
                    'end' => $appointment->end_time,
                    'description' => $appointment->description ?? '',
                    'extendedProps' => [
                        'reason' => $appointment->reason ?? '',
                        'type' => $appointment->type->name ?? 'No especificado',
                    ],
                    'color' => $appointment->type->color ?? '#FFFFFF',
                ];

                if ($appointment->block_type_id && $appointment->block_end_date) {
                    $event['startTime'] = Carbon::parse($appointment->start_time)->format('H:i');
                    $event['endTime'] = $appointment->end_time ? Carbon::parse($appointment->end_time)->format('H:i') : null;
                    $event['daysOfWeek'] = $this->getDaysOfWeek($appointment->block_type_id);
                    $event['startRecur'] = Carbon::parse($appointment->start_time)->toDateString();
                    $event['endRecur'] = Carbon::parse($appointment->block_end_date)->toDateString();
                }

                return $event;
            });

        return response()->json($appointments);
    }

    // Función auxiliar para obtener días de la semana
    private function getDaysOfWeek(int $blockTypeId)
    {
        switch ($blockTypeId) {
            case 1: // Diario
                return null; // Null indica todos los días
            case 2: // Semanal
                return [1, 2, 3, 4, 5]; // Lunes a viernes
            case 3: // Mensual
                return [Carbon::parse('first day of this month')->dayOfWeek]; // Día específico del mes
            default:
                return null;
        }
    }


    public function attend(Appointment $appointment)
    {
        // Aquí puedes cargar una vista con los datos necesarios para la atención
        // Por ejemplo, redirigir a un componente Livewire de atención o procesar directamente
        return view('appointments.attend', [
            'appointment' => $appointment,
        ]);
    }
}
