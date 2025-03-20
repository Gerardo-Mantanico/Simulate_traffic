<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Calles;
use App\View\Components\Layout; 
#[Layout('components.layouts.admin', ['title' => 'administrador'])]

class CalleTable extends Component
{
    public $data= [];
    public function mount(){
        $this->data = Calles::all()->toArray();
    }


    public function render()
    {
        return view('livewire.calle-table')->layout('components.layouts.admin', ['title' => 'administrador']);
    }
    
}
