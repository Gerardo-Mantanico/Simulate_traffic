<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB; 


class RAutosTardanMas extends Component
{
    public $data= [];


    public function mount()
    {
        // Consulta y convierte la colección a un arreglo
        $this->data = DB::table('autos_tardan_mas')->get()->toArray();
    }
    
    



    public function render()
    {
        return view('livewire.r-autos-tardan-mas', [
            'data' => $this->data
        ]);
    }
}
