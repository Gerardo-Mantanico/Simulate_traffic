<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Semaforo;

class SemaforoTable extends Component
{
    public $data= [];
    public function mount(){
        $this->data = Semaforo::all()->toArray();
    }

    public function render()
    {
        return view('livewire.semaforo-table');
    }
}
