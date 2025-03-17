<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Semaforo;

class CardSemaforo extends Component
{
    public $semaforo; // Propiedad para almacenar el semáforo

    public function mount()
    {
        $this->semaforo = Semaforo::find(1); // Obtener el semáforo por Id
    }

    public function render()
    {
        return view('livewire.card-semaforo', [
            'semaforo' => $this->semaforo // Pasamos el objeto semáforo a la vista
        ]);
    }
}

