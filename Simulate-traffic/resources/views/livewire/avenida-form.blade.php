<div class="flex flex-col gap-2 p-8">
@if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif    

    <x-auth-header :title="__(' Hola crear una avenida')" :description="__('Introduce los datos a continuación para crear una avenida')" />
    <form wire:submit="submit" class="flex flex-col gap-6">
        <div class="grid auto-rows-min gap-4 md:grid-cols-2">
            <!-- Name -->
            <flux:input
                wire:model="calle_id"
                :label="__('Numero de avenida')"
                type="number"
                required
                autofocus
                autocomplete="calle_id"
                :placeholder="__('Numero de avidan')"
            />
            <!-- Color rojo -->
            <flux:input
                wire:model="no_carriles"
                :label="__('Numero de carriles')"
                type="number"
                required
                min="0"  
                step="1" 
                autocomplete="name"
                :placeholder="__('Numero de carriles')"
            />
        </div>
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
           
        <div>
            <label for="cardinalidad_id" class="block text-sm font-medium text-white">
                {{ __('Orientacion') }}
            </label>
            <select wire:model="cardinalidad_id" id="rol" class="mt-1 block w-full text-sm text-white rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">{{ __('Selecionar Cardinalidad') }}</option>
                <option value="1">{{ __('Norte') }}</option>
                <option value="2">{{ __('Sur') }}</option>
                <option value="3">{{ __('Este') }}</option>
                <option value="3">{{ __('Oste') }}</option>
            </select>
        </div>

        <div>
            <label for="Orientacion del semaforo" class="block text-sm font-medium text-white">
                {{ __('Orientacion') }}
            </label>
            <select wire:model="cardinalidad_id" id="rol" class="mt-1 block w-full text-sm text-white rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">{{ __('Selecionar Cardinalidad') }}</option>
                <option value="1">{{ __('Norte') }}</option>
                <option value="2">{{ __('Sur') }}</option>
                <option value="3">{{ __('Este') }}</option>
                <option value="3">{{ __('Oste') }}</option>
            </select>
        </div>
        </div>
    <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full bg-green-600 " >
                {{ __('Registrar semaforo') }}
            </flux:button>
        </div>
    </form>
</div>
