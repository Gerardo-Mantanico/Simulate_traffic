<x-layouts.app title="Dashboard">

@livewire('user-table')

    <div class=" flex h-full w-full flex-1 flex-col gap-8 rounded-xl">
    <div class=" relative aspect-video overflow-hidden  dark:bg-zinc-50 rounded-xl  text-black">
                 
               
    </div>   
    <div class="grid auto-rows-min gap-4 md:grid-cols-3">
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
