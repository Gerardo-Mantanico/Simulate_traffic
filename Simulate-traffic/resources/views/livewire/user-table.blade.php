<livewire:data-table
    :columns="['id', 'name', 'email']"
    :data="$data"
    :action-buttons="[['label' => 'Eliminar', 'action' => 'deleteUser']]"
/>
