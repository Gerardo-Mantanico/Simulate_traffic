<div class="dark:bg-zinc-50">

<livewire:data-table
    :columns="[
        'users_id',
        'hora_inicial',
        'hora_final',
        'interseccion_id',
        'simulacion_id',
        'comentario', 
    ]"
    :data="$data"
    :action-buttons="[
        ['label' => ' ', 'action' => 'deleteUser'],
    ]"
    :nameTable="'Historial de iteraciones'"
/>   
</div>


