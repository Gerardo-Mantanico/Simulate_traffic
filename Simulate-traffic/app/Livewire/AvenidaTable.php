<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vias;

class AvenidaTable extends Component
{
    public $data= [];
    public function mount(){
        $this->data =  Vias::all()->toArray();
    }


    public function render()
    {
        return view('livewire.avenida-table')->layout('components.layouts.admin', ['title' => 'administrador']);
    }
}
