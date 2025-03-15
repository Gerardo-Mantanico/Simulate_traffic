<?php

namespace App\Livewire;

use Livewire\Component;

class DataTable extends Component
{
    public $columns = []; // Columnas de la tabla
    public $data = [];    // Datos de la tabla
    public $actionButtons = []; // Acciones (como eliminar)
    public $search = ''; // Campo de búsqueda
    public $perPage = 10; // Número de registros por página


    
    public function render()
    {
        $query = $this->model::query();
        // Agregar búsqueda (por cada columna que queramos filtrar)
        if ($this->search) {
            foreach ($this->columns as $column) {
                $query->orWhere($column, 'like', '%' . $this->search . '%');
            }
        }
        // Paginación
        $data = $query->paginate($this->perPage);
        return view('livewire.table', compact('data'));
    }
}
