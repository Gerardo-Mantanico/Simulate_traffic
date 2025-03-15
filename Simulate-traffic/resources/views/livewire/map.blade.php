<div class="contenedor bg-amber-300">
    <!-- Contenido aquí -->
     <h1>hola amiguios</h1>
</div>

@push('scripts')
    <!-- Cargar archivo JS solo para este componente -->
    <script src="{{ asset('js/Tablero.js') }}" defer></script>
    <script src="{{ asset('js/Auto.js') }}" defer></script>
    <script src="{{ asset('js/Main.js') }}" defer></script>    
@endpush
