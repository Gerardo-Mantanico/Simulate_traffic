
<div id="container-map"></div>
@stack('scripts')

@push('scripts')
    <!-- Cargar archivo JS solo para este componente -->
    <script src="{{ asset('js/Tablero.js') }}" defer></script>
    <script src="{{ asset('js/Auto.js') }}" defer></script>
    <script src="{{ asset('js/Main.js') }}" defer></script>    
@endpush
