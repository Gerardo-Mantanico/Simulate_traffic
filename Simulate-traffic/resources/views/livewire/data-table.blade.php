<div>
    <table class="min-w-full bg-white border border-gray-300 shadow-lg rounded-lg">
        <thead class="bg-gray-200">
            <tr>
                @foreach($columns as $column)
                    <th class="px-4 py-2 text-left font-bold">{{ $column }}</th>
                @endforeach
                @if($actionButtons)
                    <th class="px-4 py-2 text-left font-bold">Acciones</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr class="border-b hover:bg-gray-100">
                    @foreach($columns as $column)
                        <td class="px-4 py-2">{{ $row[$column] ?? '' }}</td>
                    @endforeach
                    @if($actionButtons)
                        <td class="px-4 py-2">
                            @foreach ($actionButtons as $action)
                                <button wire:click="{{ $action['action'] }}({{ $row['id'] }})" class="text-red-500 hover:text-red-700">
                                    {{ $action['label'] }}
                                </button>
                            @endforeach
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
