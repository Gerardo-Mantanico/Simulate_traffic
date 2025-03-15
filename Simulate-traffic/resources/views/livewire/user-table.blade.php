<div class="dark:bg-zinc-50">
<div class="relative h-15">
    <!-- Otros elementos dentro del contenedor -->

    <!-- Botón en la parte inferior derecha -->
    <button class="absolute mt-10 bottom-4 right-4 px-4 py-2 rounded-lg text-white bg-green-600 hover:bg-red-700 focus:ring-2 focus:ring-red-500 transition">
        Agregar Usuarios
    </button>
</div>
<livewire:data-table
    :columns="[
        'dpi',
        'name',
        'last_name',
        'phone_number',      
        'email',       
    ]"
    :data="$data"
    :action-buttons="[
        ['label' => 'Eliminar', 'action' => 'deleteUser'],
        ['label' => 'Editar', 'action' => 'editUser']
    ]"
    :nameTable="'USUARIOS'"
/>
</div>