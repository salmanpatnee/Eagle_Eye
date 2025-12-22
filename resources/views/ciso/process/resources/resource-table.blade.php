<x-table.table>
    <x-table.thead>
        <x-table.th label="Document Name" />
        <x-table.th label="Type" />
        <x-table.th label="View" />
    </x-table.thead>
    <x-table.tbody>
        @foreach ($resources as $resource)
            <tr>
                <x-table.td>{{ $resource->file_name }}</x-table.td>
                <x-table.td>{{ $resource->file_type === 'application/pdf' ? 'PDF' : 'DOC' }}
                </x-table.td>
                <x-table.td>
                    @if ($resource->file_type === 'application/pdf')
                        <a href="{{ route('process.resource.template.pdf', $resource->id) }}">View</a>
                    @else
                        <a href="{{ route('process.resource.download', $resource->id) }}" download>Download</a>
                    @endif
                </x-table.td>
            </tr>
        @endforeach
    </x-table.tbody>
</x-table.table>
