<?php

namespace App\Livewire;

use Livewire\Component;

class AvenidaForm extends Component
{
    public int $calle_id;
    public int $no_carriles;
    public int $direccion;
    public int $semaforo_id;
    
    protected $rules = [
        'calle_id' => 'required|integer|min:1',
        'no_carriles' => 'required|integer|min:1',
        'direccion' => 'required|string|max:5',
        'semaforo_id' => 'nullable|exists:semaforos,id',
    ];
 
    public function submit()
    {
        session()->flash('message', 'Calle registrada con éxito.');
        $this->validate();

        \App\Models\Vias::create([
            'calle_id' => $this->calle_id,
            'no_carriles' => $this->no_carriles,
            'direccion' => $this->direccion,
            'semaforo_id' => $this->semaforo_id,
        ]);

        $this->reset();
    }


    public function render()
    {
        return view('livewire.avenida-form')->layout('components.layouts.admin', ['title' => 'administrador']);
    }
}
