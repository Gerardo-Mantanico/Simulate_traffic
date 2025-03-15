<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;

class UserTable extends Component
{
    public $search = ''; // Filtro de búsqueda
    public $perPage = 10; // Número de elementos por página
    public $columns = ['id', 'name', 'email']; // Definir las columnas que se mostrarán en la tabla
    public $actionButtons = [
        [
                'label' => 'Eliminar',
                'action' => 'deleteUser',
        ]
    ];
    public $data = [];
    
    public function mount()
        {
            $this->data = User::all()->toArray(); // Obtén los usuarios
        }
    
        // Método para eliminar un usuario
        public function deleteUser($userId)
        {
            $user = User::find($userId);
            if ($user) {
                $user->delete();
                $this->data = User::all()->toArray(); // Actualiza los datos después de eliminar
            }
        }
    public function render()
    {   
        $users = User::query()
        ->when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%'); // Filtra por nombre
        })
        ->paginate($this->perPage); // Paginación
        return view('livewire.user-table', compact('users'));
    }
}
