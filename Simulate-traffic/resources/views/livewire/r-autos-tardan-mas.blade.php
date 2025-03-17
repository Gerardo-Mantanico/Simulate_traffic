
<div>
<h1 class="text-white text-center p-4 text-3xl font-bold" >Reporte de los autos que se tardardan mas en pasar</h1>

        <!-- Tabla con los datos de los vehículos -->
        <table class="min-w-full table-auto text-sm text-left text-white border-collapse">
        <thead class="bg-zinc-50 border-b border-zinc-500">
            <tr>
            <th class="px-1 py-1 font-medium">Registro ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Tipo de Vehículo</th>
                <th>Tipo de Conductor</th>
                <th>Distancia</th>
                <th>Tiempo de Reacción</th>
                <th>Tiempo</th>
                <th>Velocidad</th>
                <th>Género del Conductor</th>
            </tr>
        </thead>
        <tbody class="bg-zinc-200">
            @foreach ($data as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->registro_id }}</td>
                    <td>{{ $vehiculo->vehiculo_marca }}</td>
                    <td>{{ $vehiculo->vehiculo_modelo }}</td>
                    <td>{{ $vehiculo->tipo_vehiculo }}</td>
                    <td>{{ $vehiculo->tipo_conductor }}</td>
                    <td>{{ $vehiculo->distancia }}</td>
                    <td>{{ $vehiculo->tiempo_reaccion }}</td>
                    <td>{{ $vehiculo->tiempo }}</td>
                    <td>{{ $vehiculo->velocidad }}</td>
                    <td>{{ $vehiculo->genero_conductor }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>