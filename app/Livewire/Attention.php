<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use Livewire\Attributes\On; 

class Attention extends Component
{
    public $appointmentId;
    public $clinicalNotes;
    public $isCompleted;
    public $appointment;
    public string $clinical_notes = '';
    public $document;
   

    public function mount($appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        $this->appointmentId = $appointment->id;
        $this->clinicalNotes = $appointment->clinical_notes;
        $this->isCompleted = $appointment->is_completed;
        $this->clinical_notes = $appointment->clinical_notes ?? '';
        $this->appointment = $appointment;
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

    #[On('document-updated')] 
    public function updateClinicalNotes($content)
    {
        
        if (is_string($content)) {
            $this->clinical_notes = $content;
        } else {
            throw new \Exception("Expected string, received: " . gettype($content));
        }
            
    }
    

    public function saveNotes()
    {
        $appointment = Appointment::findOrFail($this->appointmentId);
        $appointment->update(['clinical_notes' => $this->clinical_notes]);

        session()->flash('message', 'Notas guardadas exitosamente.');
        $this->dispatch('saved', 'Notas guardadas exitosamente.');
    }
    

    public function render()
    {
        $appointment = $this->appointment;
        return view('livewire.attention', compact('appointment'));
    }

    public function updatedDocument($value)
    {
        $this->clinical_notes = $value;

        $this->saveNotes();
    }

}

