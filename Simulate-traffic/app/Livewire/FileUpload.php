<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FileUpload extends Component
{
    use WithFileUploads;

    public $file;
    public $data = [];  // Esta variable almacenará el arreglo de datos

    public function save()
    {
        $this->validate([
            'file' => 'required|mimes:json,xml,txt|max:1024', // Limitar a 1MB
        ]);

        // Guardamos el archivo
        $path = $this->file->store('uploads', 'public');

        // Leemos el contenido del archivo
        $content = file_get_contents(storage_path("app/public/{$path}"));

        // Verificamos el tipo de archivo y lo procesamos
        if ($this->file->getClientOriginalExtension() == 'json') {
            $this->data = json_decode($content, true); // Convertimos el contenido en un arreglo
        } elseif ($this->file->getClientOriginalExtension() == 'xml') {
            // Si es XML, lo podemos convertir a un arreglo con simplexml
            $xml = simplexml_load_string($content);
            $this->data = json_decode(json_encode($xml), true); // Convertimos el XML a un arreglo
        } elseif ($this->file->getClientOriginalExtension() == 'txt') {
            // Si es un archivo TXT, lo podemos procesar como texto y dividirlo en líneas
            $this->data = explode(PHP_EOL, $content); // Divide el archivo por líneas
        }

        // Mostramos un mensaje de éxito
        session()->flash('message', 'Archivo subido exitosamente: ' . $path);
    }

    public function render()
    {
        return view('livewire.file-upload');
    }
}
