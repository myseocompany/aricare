<?php

namespace App\Livewire\PatientProfile;

use Livewire\Component;

class AddressData extends Component
{
    public $address;

    public function mount($address = null)
    {
        $this->address = $address ?? [
            'street' => '',
            'city' => '',
            'state' => '',
            'zip' => '',
        ];
    }

    public function save()
    {
        $this->validate([
            'address.street' => 'required|string|max:255',
            'address.city' => 'required|string|max:255',
        ]);

        // Guardar lógica aquí
        session()->flash('message', 'Domicilio guardado exitosamente.');
    }

    public function render()
    {
        return view('livewire.patient-profile.address-data');
    }
}

