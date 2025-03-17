<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Semaforo;

class CardSemaforo extends Component
{
    public $semaforos = [];
    public $tiempo_rojo, $tiempo_color_amarillo, $tiempo_color_verde;

    // Escuchar el evento para actualizar los semáforos cuando se generen datos
    protected $listeners = ['actualizarSemaforos' => 'actualizarSemaforos'];

    // Actualizar semáforos cuando se emita el evento desde el componente padre
    public function actualizarSemaforos($semaforos)
    {
        $this->semaforos = $semaforos;

        // Configurar los tiempos iniciales si es necesario (ejemplo con el primer semáforo)
        if (isset($this->semaforos[0])) {
            $this->tiempo_rojo = $this->semaforos[0]->tiempo_color_rojo;
            $this->tiempo_color_amarillo = $this->semaforos[0]->tiempo_color_amarillo;
            $this->tiempo_color_verde = $this->semaforos[0]->tiempo_color_verde;
        }
    }

    // Método para actualizar los tiempos de semáforo en la base de datos
    public function submit()
    {
        // Actualizamos los tiempos de los semáforos (por ejemplo, el primero de la lista)
        $this->semaforos[0]->tiempo_color_rojo = $this->tiempo_rojo;
        $this->semaforos[0]->tiempo_color_amarillo = $this->tiempo_color_amarillo;
        $this->semaforos[0]->tiempo_color_verde = $this->tiempo_color_verde;

        // Guardar semáforo (esto depende de tu modelo y cómo gestionas la base de datos)
        // En este caso, guardamos el primer semáforo
        $this->semaforos[0]->save();

        // Emitir evento para notificar al componente padre que el semáforo ha sido actualizado
        $this->emit('semaforoActualizado', $this->semaforos[0]);
    }



    public function render()
    {
        return view('livewire.card-semaforo');
    }
}

