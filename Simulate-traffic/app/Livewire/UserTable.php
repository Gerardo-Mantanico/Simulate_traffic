<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;

class UserTable extends Component
{
    
    public $data = [];
    
    public function mount()
        {
            $this->data = User::all()->toArray(); // Obtén los usuarios
        }
    
    public function render()
    {   
       
        return view('livewire.user-table');
    }
}
