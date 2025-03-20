<?php

namespace App\Livewire;

use Livewire\Component;

class Calleform extends Component
{
    public function render()
    {
        return view('livewire.calleform')->layout('components.layouts.admin', ['title' => 'administrador']);
    }
}
