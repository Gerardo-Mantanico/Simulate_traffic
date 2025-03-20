<?php

namespace App\Livewire;

use Livewire\Component;

class CalleTable extends Component
{
    public function render()
    {
        return view('livewire.calle-table')->layout('components.layouts.admin', ['title' => 'administrador']);
    }
}
