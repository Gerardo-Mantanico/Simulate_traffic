<div>
    <h1>Generación de Modelos</h1>

    <h2>Semáforos Generados:</h2>
    <ul>
        @foreach($semaforos as $semaforo)
            <li>
                Nombre: {{ $semaforo->nombre }} | Rojo: {{ $semaforo->tiempo_color_rojo }} | Amarillo: {{ $semaforo->tiempo_color_amarillo }} | Verde: {{ $semaforo->tiempo_color_verde }}
            </li>
        @endforeach
    </ul>

 

    <h2>Calles Generadas:</h2>
    <ul>
        @foreach($calles as $calle)
            <li>
                Calle: {{ $calle->nombre }} | Largo: {{ $calle->largo }} | Cardinalidad: {{ $calle->cardinalidad_id }}
            </li>
        @endforeach
    </ul>

    <h2>Vías Generadas:</h2>
    <ul>
        @foreach($vias as $via)
            <li>
                Via ID: {{ $via->id }} | Carriles: {{ $via->no_carriles }} | Dirección: {{ $via->direccion }}
            </li>
        @endforeach
    </ul>

    <h2>Carriles Generados:</h2>
    <ul>
        @foreach($carriles as $carril)
            <li>
                Carril ID: {{ $carril->id }} | Ancho: {{ $carril->ancho }} | Condiciones ID: {{ $carril->condiciones_id }}
            </li>
        @endforeach
    </ul>

    <h2>Registros de Tráfico Generados:</h2>
    <ul>
        @foreach($registroTrafico as $registro)
            <li>
                Distancia: {{ $registro->distancia }} | Tiempo Reacción: {{ $registro->tiempo_reaccion }} | Velocidad: {{ $registro->velocidad }}
            </li>
        @endforeach
    </ul>
</div>
