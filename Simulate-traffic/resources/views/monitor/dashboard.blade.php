
<x-layouts.app title="Dashboard">
<div class="grid grid-cols-5 gap-4">
    <flux:navlist.item icon="cloud-upload" :href="route('file')" :current="request()->routeIs('file')" wire:navigate>{{ __('Carga de archivo') }}</flux:navlist.item>
    <flux:navlist.item icon="file" :href="route('file')" :current="request()->routeIs('file')" wire:navigate>{{ __('Generar datos') }}</flux:navlist.item>      
    <flux:navlist.item icon="file" :href="route('file')" :current="request()->routeIs('file')" wire:navigate>{{ __('Run') }}</flux:navlist.item>      
    <flux:navlist.item icon="file" :href="route('file')" :current="request()->routeIs('file')" wire:navigate>{{ __('Run') }}</flux:navlist.item>      
    <flux:navlist.item icon="file" :href="route('file')" :current="request()->routeIs('file')" wire:navigate>{{ __('Run') }}</flux:navlist.item>      

</div>
    <div class=" flex h-full w-full flex-1 flex-col gap-8 rounded-xl">
    <div class=" relative aspect-video overflow-hidden rounded-xl  text-black">
        <livewire:map/>
    </div>   
    <div class="grid auto-rows-min gap-4 md:grid-cols-4">
    <div class=" bg-gray-100 relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
                <h6>configuracion</h6>
            </div>
            <div class=" bg-gray-100 relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
                <h6>configuracion</h6>
            </div>
            <div class=" bg-gray-100 relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
                <h6>configuracion</h6>
            </div>
            <div class=" bg-gray-100 relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
                <h6>configuracion</h6>
            </div>
           
        </div>
    </div>
</x-layouts.app>
