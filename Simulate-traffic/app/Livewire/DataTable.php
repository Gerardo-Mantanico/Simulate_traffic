<?php

namespace App\Livewire;

use Livewire\Component;

class DataTable extends Component
{
    public $columns = [];             // Columnas de la tabla
    public $data = [];                // Los datos de la tabla
    public $search = '';              // Filtro de búsqueda
    public $actionButtons = [];       // Botones de acción para cada fila
    public $filterColumn = '';        // Columna por la que filtrar
    public $nameTable = 'Table usuario'; 

    // Método para pasar las columnas, los datos y los botones de acción
    public function mount($columns = [], $data = [], $actionButtons = [],$nameTable)
    {
        $this->columns = $columns;
        $this->data = $data;
        $this->actionButtons = $actionButtons;
        $this->nameTablero = $nameTable;

    }

    public function deleteUser($id)
    {
        // Encuentra al usuario y elimínalo
        $user = User::find($id);
        
        if ($user) {
            $user->delete();
            session()->flash('message', 'Usuario eliminado correctamente.');
        } else {
            session()->flash('message', 'Usuario no encontrado.');
        }

        // Recargar los datos después de la eliminación
        $this->data = User::all();
    }
    
    // Método render que solo filtra los datos, sin paginación
    public function render()
    {
        $filteredData = collect($this->data);

        // Filtrar los datos si se aplica búsqueda
        if ($this->search) {
            $filteredData = $filteredData->filter(function ($item) {
                return str_contains(strtolower($item[$this->filterColumn]), strtolower($this->search));
            });
        }

        // Retornar la vista con los datos filtrados
        return view('livewire.data-table', ['data' => $filteredData]);
    }
}
