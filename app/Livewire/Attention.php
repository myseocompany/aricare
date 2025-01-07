<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;

class Attention extends Component
{
    public $appointmentId;
    public $clinicalNotes;
    public $isCompleted;
    public string $clinical_notes = '';

    public function mount($appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        $this->appointmentId = $appointment->id;
        $this->clinicalNotes = $appointment->clinical_notes;
        $this->isCompleted = $appointment->is_completed;
        $this->clinical_notes = $appointment->clinical_notes ?? '';
    }

    public function saveAttention()
    {
        $appointment = Appointment::findOrFail($this->appointmentId);
        $appointment->update([
            'clinical_notes' => $this->clinicalNotes,
            'is_completed' => $this->isCompleted,
            'attention_date' => now(),
        ]);

        session()->flash('message', 'Atención guardada correctamente.');
    }

    public function updateClinicalNotes($content)
    {
        $this->clinical_notes = $content;
    }

    public function saveNotes()
    {
        $appointment = Appointment::find($this->appointmentId);
        $appointment->update(['clinical_notes' => $this->clinical_notes]);

        session()->flash('message', 'Notas guardadas exitosamente.');
    }

    public function render()
    {
        return view('livewire.attention');
    }
}

