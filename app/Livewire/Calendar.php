<?php

namespace App\Livewire;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Event;
use App\Models\Appointment;
use App\Models\AppointmentType;
use App\Models\User;
use App\Models\Branch;
use App\Models\Resource;





class Calendar extends Component
{
    
    public $appointments = [];
    public $types = [];

    public $startDate;
    public $endDate;
    public $color;
    public $branches;
    public $resources;
    public $patients;
    public $doctors;
    
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
                    'type' => $appointment->type->name ?? 'No especificado',
                ],
                'color' => $appointment->type->color ?? '#FFFFFF', // Color del tipo de cita
            ];
        })->toArray();
}


    public function mount()
    {
        $this->types = AppointmentType::all();
        $this->branches = Branch::all();
        $this->doctors = User::whereHas('roles', function ($query) {
            $query->where('name', 'doctor');
        })->get();

        $this->patients = User::whereHas('roles', function ($query) {
            $query->where('name', 'patient');
        })->get();

        $this->resources = Resource::all();


 

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
                'color' => $appointment->type->color ?? '#FFFFFF', // Color del tipo de cita
            ];
        })->toArray();


    }
    
    public $appointment = [
        'date' => '',
        'time' => '',
        'patient' => '',
        'reason' => '',
        'color' => '',
    ];
    
    public function saveAppointment()
    {
        
        $this->validate([
            'appointment.date' => 'required|date',
            'appointment.time' => 'required',
            'appointment.patient' => 'required',
            'appointment.reason' => 'required',
            'appointment.type_id' => 'required|exists:appointment_types,id', // Validación del tipo de cita
        ]);

        Appointment::create([
            'date' => $this->appointment['date'],
            'time' => $this->appointment['time'],
            'patient' => $this->appointment['patient'],
            'reason' => $this->appointment['reason'],
            'appointment_type_id' => $this->appointment['type_id'], // Guardar el tipo de cita
        ]);
        
        $this->dispatch('closeModal');
        $this->reset('appointment');
        $this->emit('refreshCalendar');
        //dd($this->appointment);
        $this->dispatch('closeModal');
        /*
        Appointment::create($this->appointment);
    
        // Resetea el formulario
        $this->reset('appointment');
    
        // Emite un evento para actualizar el calendario
        $this->emit('refreshCalendar');
    
        // Cierra el modal
        $this->dispatch('closeModal', ['modalId' => 'createAppointmentModal']);
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
                'color' => $event->type->color ?? '#FFFFFF', // Fallback al color blanco
                
            ];
        }

        return view('livewire.calendar', [
            'events' => $events
        ]);
    }

    
}
