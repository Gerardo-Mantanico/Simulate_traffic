<div class="container  dark:bg-zinc-100 bg-zinc-50 w-hull mx-auto p-3 rounded-lg shadow-lg">
   <!-- Mensaje de éxito -->
    @if (session()->has('message'))
        <div class="alert alert-success bg-green-500 text-white p-3 rounded-md shadow-md mb-4">
            {{ session('message') }}
        </div>
    @endif
 <h1 class="text-white text-center p-4 text-3xl font-bold" >{{ $nameTable }}</h1>
    <!-- Campo de búsqueda -->
    <div class="flex mb-4 space-x-4">
        <div class="flex-1">
            <input type="text" wire:model="search" class="form-control dracula-input py-2 px-4 rounded-lg border border-zinc-500 focus:ring-2 focus:ring-purple-500 bg-zinc-50 text-white placeholder-gray-400" placeholder="Buscar...">
        </div>

        <!-- Campo para seleccionar la columna de filtrado -->
        <div class="flex-1">
            <select wire:model="filterColumn" class="form-control dracula-select py-2 px-4 rounded-lg border border-zinc-500 focus:ring-2 focus:ring-purple-500 bg-zinc-50 text-white">
                <option value="">Seleccionar columna</option>
                @foreach ($columns as $column)
                    <option value="{{ $column }}">{{ ucfirst($column) }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Tabla con estilo Dracula -->
    <table class="min-w-full table-auto text-sm text-left text-white border-collapse">
        <thead class="bg-zinc-50 border-b border-zinc-500">
            <tr>
                @foreach ($columns as $column)
                    <th class="px-1 py-1 font-medium">{{ ucfirst($column) }}</th>
                @endforeach
                <th class="px-1 py-3 font-medium">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-zinc-200">
            @foreach ($data as $item)
                <tr class="border-b border-zinc-500 hover:bg-zinc-800">
                    @foreach ($columns as $column)
                        <td class="px-2 py-2">{{ $item[$column] }}</td>
                    @endforeach
                    <td class="px-1 py-2">
                        @foreach ($actionButtons as $action)
                            <button wire:click="{{ $action['action'] }}({{ $item['id'] }})" class="btn dracula-btn px-4 py-2 rounded-lg text-white bg-red-400 hover:bg-red-700 focus:ring-2 focus:ring-red-500 transition">
                                {{ $action['label'] }}
                            </button>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
