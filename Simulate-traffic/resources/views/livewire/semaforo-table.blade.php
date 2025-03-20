

<div>
<div class="dark:bg-zinc-50">
<div class="relative h-15">
    <!-- Otros elementos dentro del contenedor -->

    <!-- Botón en la parte inferior derecha -->
    <a href="/semaforo/add">
    <button class="absolute mt-10 bottom-4 right-4 px-4 py-2 rounded-lg text-white bg-green-600 hover:bg-red-700 focus:ring-2 focus:ring-red-500 transition">
        Agregar Semaforo
    </button>
</a>

</div>
<livewire:data-table
    :columns="[
        'nombre',
        'tiempo_color_rojo',
        'tiempo_color_amarillo',
        'tiempo_color_verde',
        'tiempo_total',     
    ]"
    :data="$data"
    :action-buttons="[
        ['label' => 'Eliminar', 'action' => 'deleteUser'],
    ]"
    :nameTable="'SEMAFOROS'"
/>   
</div>
</div>
