<?php

namespace App\Livewire;

use Livewire\Component;

class RegisterUser extends Component

    {
        public $nombre;
        public $apellido;
        public $rol;
        public $email;
        public $genero;
        public $dpi;
        public $telefono;
        public $direccion;
        public $password;
        public $password_confirmation;

    
        // Regla de validación para el formulario
        protected $rules = [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'genero' => 'required|numeric|digits:13',
            'dpi' => 'required|numeric|digits:13',
            'telefono' => 'required|numeric|digits:13',
            'direccion' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ];
        
    
        // Método para manejar el envío del formulario
        public function submit()
        {
            $this->validate();
    
            // Lógica para registrar el usuario
            // Por ejemplo: Crear un nuevo usuario
            \App\Models\User::create([
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'rol' => $this->rol,
                'email' => $this->email,
                'genero' => (int) $this->genero,
                'dpi' => (int) $this->dpi,
                'telefono' => (int) $this->telefono,
                'direccion' => $this->direccion,
                'password' => bcrypt($this->password),
            ]);
    
            session()->flash('message', 'Usuario registrado con éxito.');
    
            // Opcional: Redirigir después de registrar
          //  return redirect()->route('login');
        }
    
        public function render()
        {
            return view('livewire.register-user');
        }
}
