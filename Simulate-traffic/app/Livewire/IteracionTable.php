<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Iteracion;
class IteracionTable extends Component
{
    public $data= [];
    public function mount(){
        $this->data =  Iteracion::all()->toArray();
    }
    public function render()
    {
        return view('livewire.iteracion-table');
    }
}
