<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;
    public $data = [];
    
    public function mount()
        {

            $this->data = User::all()->toArray(); // Obtén los usuarios
        //  $this->data = User::paginate(10)->items();
           // $this->data = User::paginate(10); // Paginamos los resultados
        }
    
    public function render()
    {   

        return view('livewire.user-table', [
            'data' => $this->data, // Pasamos solo los datos de la página actual
        ])->layout('components.layouts.admin', ['title' => 'administrador']);
    }
}
