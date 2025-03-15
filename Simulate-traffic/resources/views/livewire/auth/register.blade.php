<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $last_name = '';   // Apellido
    public string $dpi = '';         // DPI
    public ?string $address = null;   // Dirección
    public ?string $phone_number = null;  // Número de teléfono
    public ?string $profile_picture = null;  // Foto de perfil
    public ?string $birthdate = null;  // Fecha de nacimiento (nullable)
    public ?string $gender = null;     // Género (nullable: male, female, other)
  

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'last_name' => ['required', 'string', 'max:255'],  // Apellido
            'dpi' => ['required', 'string', 'max:20', 'unique:' . User::class],  // DPI (único)
            'address' => ['nullable', 'string', 'max:255'],  // Dirección (opcional)
            'phone_number' => ['nullable', 'string', 'max:20'],  // Número de teléfono (opcional)
            'profile_picture' => ['nullable', 'string', 'max:255'],  // Foto de perfil (opcional)
            'birthdate' => ['nullable', 'date'],  // Fecha de nacimiento (opcional)
            'gender' => ['nullable', 'in:male,female,other'],  // Género (opcional, solo estos valores permitidos)        
        ]);

        $validated['password'] = Hash::make($validated['password']);
        event(new Registered(($user = User::create($validated))));
        Auth::login($user);
        $this->redirectIntended(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Crear una cuenta')" :description="__('Introduce tus datos a continuación para crear tu cuenta')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
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

        <!-- Last Name -->
        <flux:input
            wire:model="last_name"
            :label="__('Last Name')"
            type="text"
            required
            autocomplete="family-name"
            :placeholder="__('Last name')"
        />

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

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full bg-green-600 text:white">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>
</div>
