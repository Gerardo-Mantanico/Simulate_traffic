<div class="dark:bg-zinc-50">
<div class="relative h-15">
    <!-- Otros elementos dentro del contenedor -->

    <!-- Botón en la parte inferior derecha -->
    <a href="/avenida/add">
    <button class="absolute mt-10 bottom-4 right-4 px-4 py-2 rounded-lg text-white bg-green-600 hover:bg-red-700 focus:ring-2 focus:ring-red-500 transition">
        Agregar Avenida
    </button>
</a>

</div>
<livewire:data-table
    :columns="[
        'calle_id',
        'no_carriles',
        'direccion',
        'semaforo_id'   
    ]"
    :data="$data"
    :action-buttons="[
        ['label' => 'Eliminar', 'action' => 'deleteUser'],
    ]"
    :nameTable="'AVENIDAS DE QUETZALTENANGO'"
/>   
</div>