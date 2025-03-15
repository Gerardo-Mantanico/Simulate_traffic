<livewire:data-table
    :columns="['name',  'email']"
    :data="$data"
    :action-buttons="[['label' => 'Eliminar', 'action' => 'deleteUser']]"
/>
