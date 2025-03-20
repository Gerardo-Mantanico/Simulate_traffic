<?php

namespace App\Livewire;

use Livewire\Component;

class AvenidaTable extends Component
{
    public function render()
    {
        return view('livewire.avenida-table')->layout('components.layouts.admin', ['title' => 'administrador']);
    }
}
