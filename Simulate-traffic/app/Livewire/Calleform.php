<?php

namespace App\Livewire;

use Livewire\Component;

class Calleform extends Component
{
    public int $interseccion_id=15;
    public string $nombre = '';
    public float $largo;
    public int $cardinalidad_id;

    protected $rules = [
        'interseccion_id' => 'required|integer',
        'nombre' => 'required|string|max:255',
        'largo' => 'required|numeric|min:0',
        'cardinalidad_id' => 'required|integer',
    ];
 
    public function submit()
    {
        session()->flash('message', 'Calle registrada con éxito.');
        $this->validate();

        \App\Models\Calles::create([
            'interseccion_id' => $this->interseccion_id,
            'nombre' => $this->nombre,
            'largo' => $this->largo,
            'cardinalidad_id' => $this->cardinalidad_id,
        ]);


        $this->reset();
    }


    public function render()
    {
        return view('livewire.calleform')->layout('components.layouts.admin', ['title' => 'administrador']);
    }
}
