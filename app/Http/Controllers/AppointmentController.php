<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Branch;
use Illuminate\Http\Request;

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
        $validated = $request->validate([
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i',
            'patient_id' => 'required|exists:users,id', // Validar que el paciente exista
            'doctor_id' => 'required|exists:users,id', // Validar que el doctor exista
            'branch_id' => 'required|exists:branches,id', // Validar que la sede exista
            'resource_id' => 'required|exists:resources,id', // Validar que la unidad exista
            'reason' => 'nullable|string',
            'type_id' => 'nullable|exists:appointment_types,id',
            'recurrence' => 'nullable|string|in:daily,weekly,monthly',
            'recurrence_end' => 'nullable|date|after_or_equal:date',
        ]);

        // Obtener el team_id relacionado con la sucursal
        $teamId = Branch::find($validated['branch_id'])->team_id;

        // Crear una nueva cita con los datos validados
        $appointment = Appointment::create([
            'start_time' => $validated['date'] . ' ' . $validated['start_time'], // Combinar fecha y hora de inicio
            'end_time' => $validated['end_time'] ? $validated['date'] . ' ' . $validated['end_time'] : null, // Combinar fecha y hora de fin
            'patient_id' => $validated['patient_id'],
            'doctor_id' => $validated['doctor_id'],
            'team_id' => $teamId, // Asociar el team_id derivado de la sucursal
            'branch_id' => $validated['branch_id'],
            'resource_id' => $validated['resource_id'],
            'reason' => $validated['reason'] ?? null,
            'type_id' => $validated['type_id'] ?? null,
        ]);

        // Generar citas recurrentes si se especifica recurrencia
        if ($request->filled('recurrence')) {
            $this->generateRecurrences($appointment, $validated['recurrence'], $validated['recurrence_end']);
        }

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Cita creada exitosamente.');
    }

    /**
     * Genera citas recurrentes en función de las reglas.
     *
     * @param \App\Models\Appointment $appointment
     * @param string $recurrence
     * @param string $recurrenceEnd
     */
    private function generateRecurrences(Appointment $appointment, $recurrence, $recurrenceEnd)
    {
        $startDate = new \DateTime($appointment->start_time);
        $endDate = $appointment->end_time ? new \DateTime($appointment->end_time) : null;
        $recurrenceEndDate = new \DateTime($recurrenceEnd);

        while ($startDate <= $recurrenceEndDate) {
            // Crear nueva fecha según la recurrencia
            switch ($recurrence) {
                case 'daily':
                    $startDate->modify('+1 day');
                    if ($endDate) $endDate->modify('+1 day');
                    break;
                case 'weekly':
                    $startDate->modify('+1 week');
                    if ($endDate) $endDate->modify('+1 week');
                    break;
                case 'monthly':
                    $startDate->modify('+1 month');
                    if ($endDate) $endDate->modify('+1 month');
                    break;
            }

            // Verificar si la nueva fecha está dentro del rango
            if ($startDate > $recurrenceEndDate) {
                break;
            }

            // Crear la cita recurrente
            Appointment::create([
                'start_time' => $startDate->format('Y-m-d H:i:s'),
                'end_time' => $endDate ? $endDate->format('Y-m-d H:i:s') : null,
                'patient_id' => $appointment->patient_id,
                'doctor_id' => $appointment->doctor_id,
                'team_id' => $appointment->team_id,
                'branch_id' => $appointment->branch_id,
                'resource_id' => $appointment->resource_id,
                'reason' => $appointment->reason,
                'type_id' => $appointment->type_id,
            ]);
        }
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
        ]);

        return redirect()->back()->with(['message' => 'Cita actualizada exitosamente']);
    }
}
