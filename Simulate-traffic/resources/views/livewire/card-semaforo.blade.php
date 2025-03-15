<div class="flex flex-col gap-2 p-6">
@if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif    

    <div class="relative aspect-video overflow-hidden dark:bg-zinc-100 rounded-xl text-black md:col-span-7 flex justify-center items-center">
    <img src="https://i.postimg.cc/vTPctvHM/semaforo-removebg-preview.png" alt="semaforo" class="h-full object-cover">
</div>

    <x-auth-header :title="__('semaforo las rosas la vista bella ')" :description="__('Introduce los datos a continuación.')" />

    <form wire:submit="submit" class="flex flex-col gap-6">
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
    <div class="flex items-center justify-end gap-2">
            <flux:button type="submit" variant="primary" class="w-full bg-green-600 " >
                {{ __('Guardar') }}
            </flux:button>
            <flux:button type="submit" variant="primary" class="w-full bg-green-600 " >
                {{ __('Run') }}
            </flux:button>
        </div>
    </form>
</div>
