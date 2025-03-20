<div class="flex flex-col gap-2 p-8">
@if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif    

    <x-auth-header :title="__('Crear una Calle')" :description="__('Introduce los datos a continuación para crear una calle')" />

    <form wire:submit="submit" class="flex flex-col gap-6">
        <div class="grid auto-rows-min gap-4 md:grid-cols-2">
            <!-- Name -->
            <flux:input
                wire:model="nombre"
                :label="__('Nombre')"
                type="text"
                required
                autofocus
                autocomplete="Nombre"
                :placeholder="__('Nombre')"
            />
            <!-- Color rojo -->
            <flux:input
                wire:model="tiempo_color_rojo"
                :label="__('Tiempo del color Rojo')"
                type="number"
                required
                min="0"  
                step="1" 
                autocomplete="name"
                :placeholder="__('Color Rojo')"
            />
        </div>
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
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
            <flux:input
                wire:model="tiempo_total"
                :label="__('Tiempo Total')"
                type="number"
                required
                min="0"  
                step="1" 
                placeholder="Tiempo total"
                readonly
            />
        </div>
    <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full bg-green-600 " >
                {{ __('Registrar semaforo') }}
            </flux:button>
        </div>
    </form>
</div>
