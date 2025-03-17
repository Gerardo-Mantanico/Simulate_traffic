<div class=" flex h-full w-full flex-1 flex-col gap-8 rounded-xl">
    <div class="grid h-full  grid-cols-3 md:grid-cols-10 gap-4">
    <!-- Div izquierdo (70%) -->
      
    <div class="relative overflow-hidden dark:bg-zinc-50 rounded-xl text-black md:col-span-7 ">    
        <flux:navlist variant="outline">
                    <flux:navlist.group  class=" grid auto-rows-min gap-4 md:grid-cols-4 ">
                         <flux:navlist.item icon="cloud-upload" :href="route('file')" :current="request()->routeIs('file')" wire:navigate>{{ __('Importar trafico') }}</flux:navlist.item>
                         <button class="hover: bg-green-600 text-white rounded"  wire:click="generarDatos">Generar datos</button>
                    </flux:navlist.group>
            </flux:navlist>
            <livewire:map>
        </div>
        <!-- Div derecho (30%) -->
        <div class="relative overflow-hidden dark:bg-zinc-100 rounded-xl text-black md:col-span-3">
      
        <div class="flex flex-col gap-2 p-6">

    <div class="relative aspect-video overflow-hidden dark:bg-zinc-100 rounded-xl text-black md:col-span-7 flex justify-center items-center">
    <img src="https://i.postimg.cc/vTPctvHM/semaforo-removebg-preview.png" alt="semaforo" class="h-full object-cover">
</div>

    @if ($semaforos)
        <x-auth-header :title="__('Semáforo :nombre', ['nombre' => $semaforos[0]->nombre])"
            :description="__('Introduce los datos a continuación.')" />

            <select wire:model="selectSemaforo" required class="mt-1 p-2 border rounded-md text-white">
                <label class="text-white text-bold" for="">Semáforos disponibles</label>
                <option class="text-white" value="" disabled>{{ __('Seleccionar semáforo') }}</option>
                @for ($index = 0; $index < 4; $index++)
                    <option value="{{ $index }}"> 
                        {{ $semaforos[$index]->nombre }} 
                    </option>
                @endfor
            </select>


        <form wire:submit="submit" class="flex flex-col gap-6">
        <div class="grid auto-rows-min gap-4 md:grid">
            <!-- Color rojo -->
            <flux:input
                :label="__('Tiempo del color Rojo')"
                type="number"
                required
                min="0"  
                step="1" 
                autocomplete="name"
                :placeholder="__('Color Rojo')"
                
            />
        </div>
        <div class="grid auto-rows-min gap-4 md:grid">
            <!-- Color armarillo-->
            <flux:input
                wire:model="tiempo_color_amarillo"
                :label="__('Tiempo de color Amarillo')"
                type="number"
                required
                autofocus
                min="0"  
                step="1" 
                :placeholder="__('Color Amarillo')"
                
            />
            <!-- Color verde-->
            <flux:input
                wire:model="tiempo_color_verde"
                :label="__('Tiempo de color Verde')"
                type="number"
                required
                autofocus
                min="0"  
                step="1" 
                :placeholder="__('Color Verde')"
            />
            <!-- Tiempo total -->
        </div>
    <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full bg-green-600 " >
                {{ __('Guardar') }}
            </flux:button>
        </div>
    </form>
    @endif

</div>
      
        </div>
    </div>

    <div class="grid auto-rows- gap-8 md:grid">
    <div>
            <!-- Alerta de éxito -->
     @if (session()->has('message'))
            <div class="alert alert-success bg-green-500 text-white p-3 rounded-md shadow-md mb-4">
                {{ session('message') }}
            </div>
        @endif
    <h3>Generador de Datos</h3>
    <!-- Mostrar la intersección generada -->
    @if ($interseccion)
        <p><strong>Intersección:</strong> {{ $interseccion->nombre }}</p>
    @endif

    <ul>
    @if (count($calles) > 0)
        @for ($i = 0; $i < count($calles); $i++)
            @php
                $calle = $calles[$i];  // Accede a la calle en la posición $i
            @endphp

            <div class="dark:bg-zinc-100 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6">         
                <li>
                    <h5><strong>Calle:</strong> {{ $calle->nombre }} (Largo: {{ $calle->largo }} metros)</h5>

                    <!-- Mostrar semáforos asociados a la calle -->
                    @if (count($semaforos) > 0)
                        <strong>Semáforos: {{ $semaforos[$i]->nombre }}</strong>: 
                            <li>Rojo: {{ $semaforos[$i]->tiempo_color_rojo }} seg</li>
                            <li>Amarillo: {{ $semaforos[$i]->tiempo_color_amarillo }} seg</li>
                                <li>Verde: {{$semaforos[$i]->tiempo_color_verde}} seg</li>
                    @endif

                    <!-- Mostrar las vías asociadas a la calle -->
                    @if (count($vias) > 0)
                        <strong>Vías:</strong> 
                                    <li>
                                        Dirección: {{ $vias[$i]->direccion }}
                                    </li>
                               
                    @endif

                    <!-- Mostrar carriles asociados a las vías -->
                    @if (count($carriles) > 0)
                        <strong>Carriles:</strong> 
                                        <li>
                                        Ancho: {{ $carriles[$i]->ancho }} metros | Señalizado: {{ $carriles[$i]->señalizado ? 'Sí' : 'No' }} | Condiciones ID: {{ $carriles[$i]->condiciones_id }}
                                    </li>
                    @endif

                    <!-- Mostrar registros de tráfico asociados a los carriles -->
                    @if (count($registroTrafico) > 0)
                        <strong>Registros de Tráfico:</strong> 
                        <ul>
                            @for ($m = 0; $m < 10; $m++)
                        
                                        Distancia: {{ $registroTrafico[$m]->distancia }} metros  |  Velocidad: {{ $registroTrafico[$m]->velocidad }} km/h 
                                        |  Tiempo: {{ $registroTrafico[$m]->tiempo }} seg
                                        |  Tiempo de reaccion: {{ $registroTrafico[$m]->tiempo_reaccion}} seg
                            @endfor=
                        </ul>
                    @endif

                </li>
            </div>
        @endfor
    @endif
</ul>

</div>
    </div>
</div>