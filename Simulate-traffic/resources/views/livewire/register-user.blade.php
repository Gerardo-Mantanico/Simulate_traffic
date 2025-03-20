<div class="flex flex-col gap-2 p-8">

@if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif    
<x-auth-header :title="__('Crear una cuenta')" :description="__('Introduce los datos a continuación para crear una  cuenta ')" />

    <form wire:submit="submit" class="flex flex-col gap-6">
        <div class="grid auto-rows-min gap-4 md:grid-cols-2">
            <!-- Name -->
            <flux:input
            wire:model="name"
            :label="__('Name')"
            type="text"
            required
            autofocus
            autocomplete="given-name"
            :placeholder="__('Full name')"
        />
            <!-- LasName -->
            <flux:input
            wire:model="last_name"
            :label="__('Last Name')"
            type="text"
            required
            autocomplete="family-name"
            :placeholder="__('Last name')"
        />
        </div>
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
          <!-- DPI -->
          <flux:input
            wire:model="dpi"
            :label="__('DPI')"
            type="number"
            required
            min="0"
            autocomplete="off"
            :placeholder="__('DPI (Document Personal Identification)')"
        />

        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email address')"
            type="email"
            required
            autocomplete="email"
            placeholder="email@example.com"
        />

        <!-- Password -->
        <flux:input
            wire:model="password"
            :label="__('Password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Password')"
        />
    
    </div>
        <!-- Address-->
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
        <!-- Confirm Password -->
        <flux:input
            wire:model="password_confirmation"
            :label="__('Confirm password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Confirm password')"
        />

        <!-- Address -->
        <flux:input
            wire:model="address"
            :label="__('Address')"
            type="text"
            autocomplete="address"
            :placeholder="__('Address (optional)')"
        />

        <!-- Phone Number -->
        <flux:input
            wire:model="phone_number"
            :label="__('Phone Number')"
            type="number"
            min="0"
            autocomplete="off"
            :placeholder="__('Phone number (optional)')"
        />
        </div>
       
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
              <!-- Profile Picture -->
        <flux:input
            wire:model="profile_picture"
            :label="__('Profile Picture')"
            type="text"
            autocomplete="off"
            :placeholder="__('Profile picture URL (optional)')"
        />

        <!-- Birthdate -->
        <flux:input
            wire:model="birthdate"
            :label="__('Birthdate')"
            type="date"
            autocomplete="bdate"
        />

        <!-- Gender -->
        <div>
            <label for="gender" class="block text-sm font-medium text-white">
                {{ __('Gender') }}
            </label>
            <select wire:model="gender" id="gender" class="mt-1 block w-full text-sm text-white rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">{{ __('Select Gender') }}</option>
                <option value="male">{{ __('Male') }}</option>
                <option value="female">{{ __('Female') }}</option>
                <option value="other">{{ __('Other') }}</option>
            </select>
        </div>
         <!-- rol-->
         <div>
            <label for="rol" class="block text-sm font-medium text-white">
                {{ __('Gender') }}
            </label>
            <select wire:model="rol" id="rol" class="mt-1 block w-full text-sm text-white rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">{{ __('Select Gender') }}</option>
                <option value="1">{{ __('Administrador') }}</option>
                <option value="2">{{ __('Monitoreador') }}</option>
                <option value="3">{{ __('Supervisor') }}</option>
            </select>
        </div>
        </div>
        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full bg-green-600 " >
                {{ __('Registrar usuario') }}
            </flux:button>
        </div>
    </form>
</div>
