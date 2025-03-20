<?php

namespace App\Livewire;

use Livewire\Component;

class AvenidaForm extends Component
{
    public function render()
    {
        return view('livewire.avenida-form')->layout('components.layouts.admin', ['title' => 'administrador']);
    }
}
