<?php

namespace App\Livewire;

use Livewire\Component;

class Map extends Component
{
    public $registroTrafico=[];
    public function render()
    {
        return view('livewire.map');
    }
}
