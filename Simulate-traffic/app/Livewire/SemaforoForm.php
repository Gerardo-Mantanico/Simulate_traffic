<?php

namespace App\Livewire;

use Livewire\Component;

class SemaforoForm extends Component
{
    public $nombre;
    public $tiempo_color_rojo;
    public $tiempo_color_amarillo;
    public $tiempo_color_verde;
    public $tiempo_total;

    // Reglas de validación fuera del método submit
    protected $rules = [
        'nombre' => 'required|string|max:255',
        'tiempo_color_rojo' => 'required|numeric|min:10',  // Se asegura de que el número sea positivo y mayor a 0
        'tiempo_color_amarillo' => 'required|numeric|min:10',
        'tiempo_color_verde' => 'required|numeric|min:10',
        'tiempo_total' => 'required|numeric|min:10',
    ];

      // Método para actualizar el tiempo total
      public function updated($propertyName)
      {
          $this->validateOnly($propertyName);
          
          // Sumar los tiempos en tiempo real
          $this->tiempo_total = $this->tiempo_color_rojo + $this->tiempo_color_amarillo + $this->tiempo_color_verde;
      }
      
    // Método para manejar el envío del formulario
    public function submit()
    {
        // Validación
        $this->validate();
        \App\Models\Semaforo::create([
            'nombre' => $this->nombre,
            'tiempo_color_rojo' => $this->tiempo_color_rojo,
            'tiempo_color_amarillo' => $this->tiempo_color_amarillo,
            'tiempo_color_verde' => $this->tiempo_color_verde,
            'tiempo_total' => $this->tiempo_total,
        ]);

        // Restablecer los campos del formulario
        $this->reset();

        // Mostrar mensaje de éxito
        session()->flash('message', 'Semáforo creado con éxito.');
    }

    public function render()
    {
        return view('livewire.semaforo-form');
    }
}
