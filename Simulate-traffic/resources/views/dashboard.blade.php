<x-layouts.app title="Dashboard">

<div class=" flex h-full w-full flex-1 flex-col gap-8 rounded-xl">

<livewire:generador-modelos>

    <div class="grid h-full  grid-cols-3 md:grid-cols-10 gap-4">
    <!-- Div izquierdo (70%) -->
        <div class="relative overflow-hidden dark:bg-zinc-50 rounded-xl text-black md:col-span-7 ">
            <flux:navlist variant="outline">
                    <flux:navlist.group  class=" grid auto-rows-min gap-4 md:grid-cols-4 ">
                        <flux:navlist.item  icon="file" :href="route('userRegister')" :current="request()->routeIs('userRegister')" wire:navigate>{{ __('Generar radon') }}</flux:navlist.item>
                        <flux:navlist.item icon="cloud-upload" :href="route('file')" :current="request()->routeIs('file')" wire:navigate>{{ __('Importar trafico') }}</flux:navlist.item>
                        <flux:navlist.item class="hover: bg-green-600 text-white" icon="cloud-upload" :href="route('file')" :current="request()->routeIs('file')" wire:navigate>{{ __('Run') }}</flux:navlist.item>
          
                      </flux:navlist.group>
            </flux:navlist>
            <livewire:map>
        </div>
        <!-- Div derecho (30%) -->
        <div class="relative overflow-hidden dark:bg-zinc-100 rounded-xl text-black md:col-span-3">
          <livewire:card-semaforo>
        </div>
    </div>



    <div class="grid auto-rows-min gap-4 md:grid-cols-4">
             <div class=" dark:bg-zinc-100 relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">                
            </div>
            
            <div class=" dark:bg-zinc-100 relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">         
            </div>
            
            <div class=" dark:bg-zinc-100 relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">               
            </div>

            <div class=" dark:bg-zinc-100 relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">               
            </div>

    </div>
</div>
</x-layouts.app>