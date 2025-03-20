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
                wire:model="largo"
                :label="__('Largo de la calle')"
                type="number"
                required
                min="0"  
                step="1" 
                autocomplete="largo"
                :placeholder="__('largo de la calle')"
            />
       
        </div>
              <!-- cardinalidad-->
        <div>
            <label for="cardinalidad_id" class="block text-sm font-medium text-white">
                {{ __('Orientacion del semaforo') }}
            </label>
            <select wire:model="cardinalidad_id" id="rol" class="mt-1 block w-full text-sm text-white rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">{{ __('Selecionar Cardinalidad') }}</option>
                <option value="1">{{ __('Norte') }}</option>
                <option value="2">{{ __('Sur') }}</option>
                <option value="3">{{ __('Este') }}</option>
                <option value="3">{{ __('Oste') }}</option>
            </select>
        </div>
      
    <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full bg-green-600 " >
                {{ __('Registrar semaforo) }}
            </flux:button>
        </div>
    </form>
</div>
