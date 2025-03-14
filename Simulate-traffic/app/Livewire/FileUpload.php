<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FileUpload extends Component
{
    use WithFileUploads;

    public $file;

    public function save()
    {
        $this->validate([
            'file' => 'required|mimes:json,xml,txt|', // 1MB máximo
        ]);

        $path = $this->file->store('uploads', 'public'); // Guarda en storage/app/public/uploads

        session()->flash('message', 'Archivo subido exitosamente: ' . $path);
    }

    public function render()
    {
        return view('livewire.file-upload');
    }
}
