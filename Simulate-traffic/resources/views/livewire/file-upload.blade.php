<div>
    <!-- Mensaje de éxito -->
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 mb-2">
            {{ session('message') }}
        </div>
    @endif

    <!-- Input para cargar archivos -->
    <input type="file" wire:model="file" class="border p-2">
    
    @error('file') 
        <span class="text-red-500">{{ $message }}</span> 
    @enderror

    <button wire:click="save" class="bg-blue-500 text-white p-2 mt-2">Subir Archivo</button>

    <!-- Previsualización de imagen (si es una imagen) -->
    @if ($file)
        <div class="mt-2">
            <strong>Vista previa:</strong> <br>
            @if (in_array($file->getClientOriginalExtension(), ['json', 'xml']))
                
                <img src="{{ $file->temporaryUrl() }}" class="w-32 h-32 mt-2">
            @endif
        </div>
    @endif
</div>
