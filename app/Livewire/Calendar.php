<?php

namespace App\Livewire;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Models\Appointment;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Illuminate\Support\Facades\Log;



class Calendar extends Component
{
    
    public $appointments = [];


    public $startDate;
    public $endDate;

    public function newEvent($name, $startDate, $endDate)
{   


    $validated = Validator::make(
        [
            'patient' => $name, // Mapeamos el 'name' al campo 'patient' del modelo Appointment
            'start_time' => $startDate, // Mapeamos 'startDate' al campo 'start_time'
            'end_time' => $endDate, // Mapeamos 'endDate' al campo 'end_time'
        ],
        [
            'patient' => 'required|string|min:1|max:40', // Validaciones para el nombre del paciente
            'start_time' => 'required',
            'end_time' => 'required',
        ]
    )->validate();



    $appointment = Appointment::create([
        'start_time' => Carbon::parse($startDate)->toDateTimeString(), // Fecha y hora de inicio
        'end_time' => Carbon::parse($endDate)->toDateTimeString(), // Fecha y hora de fin
        'patient' => $validated['patient'], // Asignamos el nombre del paciente
        'reason' => 'Evento creado desde el calendario', // Razón genérica
        'description' => 'Cita creada desde FullCalendar', // Descripción opcional
    ]);

    return $appointment->id; // Retornamos el ID de la cita creada
}

    public function updateEvent($id, $name, $startDate, $endDate)
    {
        

        $validated = Validator::make(
            [
                'start_time' => Carbon::parse($startDate)->toDateTimeString(), // Fecha y hora de inicio
                'end_time' => Carbon::parse($endDate)->toDateTimeString(), // Fecha y hora de fin
            ],
            [
                'start_time' => 'required',
                'end_time' => 'required',
            ]
        )->validate();

        Appointment::findOrFail($id)->update($validated);
    }


    public function getEvents()
{
    if (!$this->startDate || !$this->endDate) {
        return [];
    }

    return Appointment::whereBetween('start_time', [$this->startDate, $this->endDate])
        ->get()
        ->map(function ($appointment) {
            return [
                'id' => $appointment->id,
                'title' => $appointment->patient ?? 'Sin nombre', // Asegúrate de manejar pacientes nulos
                'start' => $appointment->start_time,
                'end' => $appointment->end_time,
                'description' => $appointment->description ?? '',
                'extendedProps' => [
                    'reason' => $appointment->reason ?? '',
                ],
            ];
        })->toArray();
}


    public function mount()
    {
        

        $this->appointments = Appointment::all()->map(function ($appointment) {
            return [
                'id' => $appointment->id,
                'title' => $appointment->patient,
                'start' => Carbon::parse($appointment->date . ' ' . $appointment->start)->toIso8601String(),
                'end' => Carbon::parse($appointment->date . ' ' . $appointment->end)->toIso8601String(),
                'description' => $appointment->description,
                'extendedProps' => [
                    'reason' => $appointment->reason,
                    'patient' => $appointment->patient,
                ],
            ];
        })->toArray();


    }
    
    public $appointment = [
        'date' => '',
        'time' => '',
        'patient' => '',
        'reason' => '',
    ];
    
    public function saveAppointment()
    {
        
        $this->validate([
            'appointment.date' => 'required|date',
            'appointment.time' => 'required',
            'appointment.patient' => 'required',
            'appointment.reason' => 'required',
        ]);
        //dd($this->appointment);
        $this->dispatch('closeModal');
        /*
        Appointment::create($this->appointment);
    
        // Resetea el formulario
        $this->reset('appointment');
    
        // Emite un evento para actualizar el calendario
        $this->emit('refreshCalendar');
    
        // Cierra el modal
        $this->dispatchBrowserEvent('closeModal', ['modalId' => 'createAppointmentModal']);
        */

    }
    

    public function render()
    {
        $events = [];

        foreach (Appointment::all() as $event) {
            $patient = "sin paciente";
            if(isset($event->patient) && ($event->patient->name != "") )
                $patient = $event->patient->name;
            
            $events[] =  [
                'id' => $event->id,
                'title' => $patient,
                'start' => Carbon::parse($event->start_time)->toIso8601String(),
                'end' => Carbon::parse($event->end_time)->toIso8601String(),
            
                
            ];
        }

        return view('livewire.calendar', [
            'events' => $events
        ]);
    }
}
