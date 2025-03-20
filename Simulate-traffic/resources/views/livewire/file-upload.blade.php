<div>
    <!-- Mensaje de éxito -->
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 mb-2">
            {{ session('message') }}
        </div>
    @endif

    <!-- Input para cargar archivos -->
    <input type="file" wire:model="file" class="border p-2">

    @error('file') 
        <span class="text-red-500">{{ $message }}</span> 
    @enderror

    <button wire:click="save" class="bg-blue-500 text-white p-2 mt-2">Subir Archivo</button>

    <!-- Previsualización de archivo -->
    @if ($file)
        <div class="mt-2">
            <strong>Vista previa:</strong> <br>
            
            @if ($file->getClientOriginalExtension() == 'json')
                <!-- Leer y mostrar el archivo JSON de forma estructurada -->
                @php
                    // Leer el contenido del archivo JSON
                    $jsonContent = file_get_contents($file->getRealPath());
                    $data = json_decode($jsonContent, true);
                @endphp

                <!-- Mostrar datos de la estructura JSON -->
                <div class="bg-gray-100 p-4 mt-2">
                    <h3 class="font-bold">Generador de Datos</h3>
                    <p><strong>Intersección:</strong> {{ $data['Intersección'] }}</p>
                    <p><strong>Calle:</strong> {{ $data['Calle']['Nombre'] }} (Largo: {{ $data['Calle']['Largo'] }})</p>
                    
                    <p><strong>Semáforos:</strong> {{ $data['Semáforos']['Cantidad'] }}</p>
                    <p><strong>Rojo:</strong> {{ $data['Semáforos']['Tiempos']['Rojo'] }}</p>
                    <p><strong>Amarillo:</strong> {{ $data['Semáforos']['Tiempos']['Amarillo'] }}</p>
                    <p><strong>Verde:</strong> {{ $data['Semáforos']['Tiempos']['Verde'] }}</p>

                    <p><strong>Vías:</strong></p>
                    <p><strong>Dirección:</strong> {{ $data['Vías']['Dirección'] }}</p>
                    <p><strong>Carriles:</strong></p>
                    <p><strong>Ancho:</strong> {{ $data['Vías']['Carriles']['Ancho'] }} | <strong>Señalizado:</strong> {{ $data['Vías']['Carriles']['Señalizado'] }} | <strong>Condiciones ID:</strong> {{ $data['Vías']['Carriles']['Condiciones ID'] }}</p>

                    <p><strong>Registros de Tráfico:</strong></p>
                    @foreach($data['RegistrosDeTráfico'] as $registro)
                        <p>Distancia: {{ $registro['Distancia'] }} | Velocidad: {{ $registro['Velocidad'] }} | Tiempo: {{ $registro['Tiempo'] }} | Tiempo de reacción: {{ $registro['TiempoDeReaccion'] }}</p>
                    @endforeach
                </div>
            @endif
        </div>
    @endif
</div>
