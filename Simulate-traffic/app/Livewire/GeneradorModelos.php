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
    public $historioSemaforo = [];
    public $interseccion;
    public $calles = [];
    public $vias = [];
    public $carriles = [];
    public $registroTrafico = [];
    public $tiempo_color_rojo;
    public $tiempo_color_amarillo;
    public $tiempo_color_verde;
    public $tiempo_total;
    public $semaforo;



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
                    $this->registroTrafico[] = $registroTrafico; 
                }
        }
    }


    public function selectSemaforo($index){
      //  $this->semaforo = $semaforos[1];
    }
    
    public function render()
    {
       // $this->data();
        return view('livewire.generador-modelos');
        // Pasar los datos al archivo Blade
       /* return view('livewire.generador-modelos', [
            'semaforos' => $this->semaforos,
            'interseccion' => $this->interseccion,
            'calles' => $this->calles,
            'vias' => $this->vias,
            'carriles' => $this->carriles,
            'registroTrafico' => $this->registroTrafico,
        ]);*/
    }

    public function generarDatos()
    {
        // Crear intersección
        $this->interseccion = new Intersecciones([
            'nombre' => fake()->name(),
        ]);

        for ($i = 1; $i < 5; $i++) {
            // Crear calles
            $calle = new Calles([
                'interseccion_id' => $this->interseccion->id,
                'nombre' => fake()->name(),
                'largo' => rand(100, 200),
                'cardinalidad_id' => $i,
            ]);
            $this->calles[] = $calle;

            // Generar semáforos
            $rojo_rand = rand(1, 60);
            $amarillo_rand = rand(1, (60 - $rojo_rand));
            $semaforo = new Semaforo([
                'nombre' =>  $i,
                'tiempo_color_rojo' => $rojo_rand,
                'tiempo_color_amarillo' => $amarillo_rand,
                'tiempo_color_verde' => 60 - ($rojo_rand + $amarillo_rand),
                'tiempo_total' => 60,
            ]);
            $this->semaforos[] = $semaforo;

            // Crear vías
            $via = new Vias([
                'calle_id' => $calle->id,
                'no_carriles' => 1,
                'direccion' => $i,
                'semaforo_id' => $semaforo->id,
            ]);
            $this->vias[] = $via;

            // Crear carriles
            $carriles = new Carriles([
                'via_id' => $via->id,
                'ancho' => rand(5, 10),
                'señalizado' => false,
                'condiciones_id' => rand(1, 5),
            ]);
            $this->carriles[] = $carriles;

            for ($j = 0; $j < 10; $j++) {
                // Crear registros de tráfico
                $registroTrafico = new RegistroTrafico([
                    'carril_id' => $carriles->id,
                    'distancia' => rand(10 * $j, 200),
                    'tiempo_reaccion' => rand(1, 5),
                    'tiempo' => rand(5, 25),
                    'velocidad' => rand(25, 30),
                    'tipo_auto_id' => rand(1, 10),
                ]);
                $this->registroTrafico[] = $registroTrafico;
            }
        }
        session()->flash('message', '¡El reporte se ha generado exitosamente!'); 
    }


    
    public function run(){
        
    }

    public function submit(){
        $semaforo = new Semaforo([
            'nombre'  => $this->nombre,
            'tiempo_color_rojo'  => $this->tiempo_color_rojo,
            'tiempo_color_amarillo' => $this->tiempo_color_amarillo,
            'tiempo_color_verde' => $this->tiempo_color_amarillo,
            'tiempo_total' => 60
        ]);
        $this->historioSemaforo[] = $semaforo;
    }

    // Método para guardar los datos en la base de datos
    public function guardarDatos()
    {
        // Guardar la intersección en la base de datos
        $this->interseccion->save();

        foreach ($this->calles as $calle) {
            // Guardar las calles en la base de datos
            $calle->save();

            foreach ($this->semaforos as $semaforo) {
                // Guardar los semáforos en la base de datos
                $semaforo->save();
            }

            foreach ($this->vias as $via) {
                // Guardar las vías en la base de datos
                $via->save();
            }

            foreach ($this->carriles as $carril) {
                // Guardar los carriles en la base de datos
                $carril->save();
            }

            foreach ($this->registroTrafico as $registro) {
                // Guardar los registros de tráfico en la base de datos
                $registro->save();
            }
        }
    }
}