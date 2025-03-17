<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Asegúrate de importar el modelo User

class RegisterUser extends Component
{
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
    public ?string $rol = null;        // Asegúrate de definir la propiedad 'rol'

    // Regla de validación para el formulario
    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'], // Aquí especificamos la tabla 'users' y la columna 'email'
        'password' => ['required', 'string', 'confirmed'],
        'last_name' => ['required', 'string', 'max:255'],  // Apellido
        'dpi' => ['required', 'string', 'max:20', 'unique:users,dpi'],  // DPI (único)
        'address' => ['nullable', 'string', 'max:255'],  // Dirección (opcional)
        'phone_number' => ['nullable', 'string', 'max:20'],  // Número de teléfono (opcional)
        'profile_picture' => ['nullable', 'string', 'max:255'],  // Foto de perfil (opcional)
        'birthdate' => ['nullable', 'date'],  // Fecha de nacimiento (opcional)
        'gender' => ['nullable', 'in:male,female,other'],  // Género (opcional, solo estos valores permitidos)        
    ];

    // Método para manejar el envío del formulario
    public function submit()
    {
        $this->validate();

        // Lógica para registrar el usuario
        // Aquí creamos un nuevo usuario con los datos proporcionados
        User::create([
            'name' => $this->name,
            'email' => $this->email,  // Asumiendo que tienes un valor para el email
            'password' => Hash::make($this->password), // Asegúrate de encriptar la contraseña con Hash::make()
            'last_name' => $this->last_name,  // Apellido
            'dpi' => $this->dpi,  // DPI
            'address' => $this->address,  // Dirección
            'phone_number' => $this->phone_number,  // Número de teléfono
            'profile_picture' => $this->profile_picture,  // Foto de perfil
            'birthdate' => $this->birthdate,  // Fecha de nacimiento
            'gender' => $this->gender,  // Género
            'rol' => $this->rol,  // Asegúrate de que la columna 'rol' exista en la tabla 'users'
        ]);

        session()->flash('message', 'Usuario registrado con éxito.');

        // Opcional: Redirigir después de registrar
        // return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.register-user');
    }
}
