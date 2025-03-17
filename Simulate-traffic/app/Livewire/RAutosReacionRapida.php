<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB; 

class RAutosReacionRapida extends Component
{
    public $vehiculos;

    public  $data =[];

    public function mount()
    {
        // Realizamos la consulta a la vista
        $this->data = DB::table('vehiculos_reaccion_rapida')->get();
    }


    public function render()
    {
        return view('livewire.r-autos-reacion-rapida',[
            'data' => $this->data
        ]);
    }
}
