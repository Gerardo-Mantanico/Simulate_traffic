<div class="flex flex-col gap-2 p-8">
    <x-auth-header :title="__('Crear una cuenta')" :description="__('Introduce los datos a continuación para crear una  cuenta ')" />

    <form wire:submit="register" class="flex flex-col gap-6">
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
            <!-- LasName -->
            <flux:input
                wire:model="apellido"
                :label="__('Apellido')"
                type="text"
                required
                autofocus
                autocomplete="name"
                :placeholder="__('Apellido')"
            />
        </div>
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <!-- Iphone-->
            <flux:input
                wire:model="telefono"
                :label="__('Telefono')"
                type="number"
                required
                autofocus
                autocomplete="name"
                :placeholder="__('Telefono')"
            />
            <!-- Address-->
            <flux:input
                wire:model="direccion"
                :label="__('Direccion')"
                type="text"
                required
                autofocus
                autocomplete="name"
                :placeholder="__('Direccion')"
            />
            <!-- Genero -->
            <flux:input
                wire:model="genero"
                :label="__('Genero')"
                type="text"
                required
                autocomplete="genero"
                placeholder="Genero"
            />
        </div>
        <!-- Address-->
        <div class="grid auto-rows-min gap-4 md:grid-cols-2">
            <flux:input
                wire:model="dpi"
                :label="__('Numero de Dpi')"
                type="text"
                required
                autofocus
                autocomplete="name"
                :placeholder="__('Dpi')"
            />
            <flux:input
            wire:model="email"
            :label="__('Correo electronico')"
            type="text"
            required
            autofocus
            autocomplete="email"
            placeholder="email@example.com"
            />
        </div>
       
        <div class="grid auto-rows-min gap-4 md:grid-cols-2">
            <!-- Password -->
            <flux:input
                wire:model="password"
                :label="__('Password')"
                type="password"
                required
                autocomplete="new-password"
                :placeholder="__('Password')"
            />

            <!-- Confirm Password -->
            <flux:input
                wire:model="password_confirmation"
                :label="__('Confirm password')"
                type="password"
                required
                autocomplete="new-password"
                :placeholder="__('Confirm password')"
            />
        </div>
        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full bg-green-600 " >
                {{ __('Registrar usuario') }}
            </flux:button>
        </div>
    </form>
</div>
