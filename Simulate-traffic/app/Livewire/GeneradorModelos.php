<?php

namespace App\Livewire;
use Faker\Factory as Faker;

use Livewire\Component;
use App\Models\Intersecciones;
use App\Models\Semaforo;
use App\Models\Calles;
use App\Models\Vias;
use App\Models\Carriles;
use App\Models\RegistroTrafico;
use App\Models\Vehiculo;
use App\Models\TipoAuto;

class GeneradorModelos extends Component
{
    // Declarar propiedades públicas para almacenar los datos
    public $semaforos = [];
    public $interseccion;
    public $calles = [];
    public $vias = [];
    public $carriles = [];
    public $registroTrafico = [];

    public function data()
    {
   
    /* generar tipos de autos
        for ($i=0; $i <20 ; $i++) { 
            $auto= TipoAuto::create([
                'vehiculo_id'=>rand(1,50),
                'tipo_conductor_id' =>rand(1,10),
                'genero_id'=>rand(1,2)
            ]);
        }
    */
        

        
        // Crear intersección
        $this->interseccion = Intersecciones::create([
            'nombre' => fake()->name()
        ]);

        for ($i = 1; $i < 5; $i++) {
            // Crear calles
            $calle = Calles::create([
                'interseccion_id' => $this->interseccion->id,
                'nombre' => fake()->name(),
                'largo' => rand(100, 200),
                'cardinalidad_id' => $i,
            ]);
            // Guardar las calles en el array
            $this->calles[] = $calle;

            //geneara semaforos
                $rojo_rand = rand(1, 60);
                $amarillo_rand = rand(1, (60 - $rojo_rand));
                $semaforo = Semaforo::create([
                    'nombre' => fake()->name(),
                    'tiempo_color_rojo' => $rojo_rand,
                    'tiempo_color_amarillo' => $amarillo_rand,
                    'tiempo_color_verde' => 60 - ($rojo_rand + $amarillo_rand),
                    'tiempo_total' => 60,
                ]);
                // Guardar en el array
                $this->semaforos[] = $semaforo;

                // Crear vías
                $via = Vias::create([
                    'calle_id' => $calle->id,
                    'no_carriles' => 1,
                    'direccion' => $i,
                    'semaforo_id' =>$semaforo->id,
                ]);
                // Guardar las vías en el array
                $this->vias[] = $via;

                // Crear carriles
                $carriles = Carriles::create([
                    'via_id' => $via->id,
                    'ancho' => rand(5, 10),
                    'señalizado' => false,
                    'condiciones_id' => rand(1, 5),
                ]);
                
                // Guardar los carriles en el array
                $this->carriles[] = $carriles;

                for ($j = 0; $j < 10; $j++) {
                    // Crear registros de tráfico
                    $registroTrafico = RegistroTrafico::create([
                        'carril_id' => $carriles->id,
                        'distancia' => rand(10 * $j, 200),
                        'tiempo_reaccion' => rand(1, 5),
                        'tiempo' => rand(5, 25),
                        'velocidad' => rand(25, 30),
                        'tipo_auto_id' => rand(1, 10),
                    ]);
                    
                    // Guardar los registros en el array
                    $this->registroTrafico[] = $registroTrafico;
                }
        }
    }

    

    public function render()
    {
        $this->data();
        // Pasar los datos al archivo Blade
        return view('livewire.generador-modelos', [
            'semaforos' => $this->semaforos,
            'interseccion' => $this->interseccion,
            'calles' => $this->calles,
            'vias' => $this->vias,
            'carriles' => $this->carriles,
            'registroTrafico' => $this->registroTrafico,
        ]);
    }
}
