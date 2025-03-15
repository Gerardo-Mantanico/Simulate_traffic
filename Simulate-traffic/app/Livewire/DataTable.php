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

    // Método para pasar las columnas, los datos y los botones de acción
    public function mount($columns = [], $data = [], $actionButtons = [])
    {
        $this->columns = $columns;
        $this->data = $data;
        $this->actionButtons = $actionButtons;
    }

    // Método para eliminar un ítem
    public function deleteItem($id)
    {
        // Eliminar el ítem de los datos
        $this->data = collect($this->data)->reject(function ($item) use ($id) {
            return $item['id'] == $id;
        });

        session()->flash('message', 'Elemento eliminado correctamente.');
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
