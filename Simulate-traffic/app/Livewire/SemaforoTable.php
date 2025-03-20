<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Semaforo;
use App\View\Components\Layout; // Asegurate que el namespace sea correcto.

#[Layout('components.layouts.admin', ['title' => 'administrador'])]
class SemaforoTable extends Component
{
    public $data= [];
    public function mount(){
        $this->data = Semaforo::all()->toArray();
    }

    public function render()
    {
        return view('livewire.semaforo-table')->layout('components.layouts.admin', ['title' => 'administrador']);
    }
}
