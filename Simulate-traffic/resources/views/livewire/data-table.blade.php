<div class="container mt-4 bg-amber-400">
    <!-- Mensaje de éxito -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Campo de búsqueda -->
    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" wire:model="search" class="form-control dracula-input" placeholder="Buscar...">
        </div>

        <!-- Campo para seleccionar la columna de filtrado -->
        <div class="col-md-4">
            <select wire:model="filterColumn" class="form-control dracula-select">
                <option value="">Seleccionar columna</option>
                @foreach ($columns as $column)
                    <option value="{{ $column }}">{{ ucfirst($column) }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Tabla con estilo Dracula -->
    <table class="table dracula-table">
        <thead>
            <tr>
                @foreach ($columns as $column)
                    <th class="text-white">{{ ucfirst($column) }}</th>
                @endforeach
                <th class="text-white">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    @foreach ($columns as $column)
                        <td class="text-white">{{ $item[$column] }}</td>
                    @endforeach
                    <td>
                        @foreach ($actionButtons as $action)
                            <button wire:click="{{ $action['action'] }}({{ $item['id'] }})" class="btn dracula-btn">
                                {{ $action['label'] }}
                            </button>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
