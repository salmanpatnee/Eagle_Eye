<table>
    <thead>
        <tr>
            <th>Document Name</th>
            <th>Type</th>
            <th>View</th>
        </tr>
    </thead>
    @foreach ($resources as $resource)
        <tr>
            <td>{{ $resource->file_name }}</td>
            <td>{{ $resource->file_type === 'application/pdf' ? 'PDF' : 'DOC' }}
            </td>
            <td>
                @if ($resource->file_type === 'application/pdf')
                    <a href="{{ route('process.resource.template.pdf', $resource->id) }}" >View</a>
                @else
                    <a href="{{ asset('storage/' . $resource->file_path) }}" download>Download</a>
                @endif
            </td>
        </tr>
    @endforeach
</table>
