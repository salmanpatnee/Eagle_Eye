@extends('layouts/cms')
@section('title', 'Process')
@section('title_ar', 'العملية')
@section('content')
    <div>
        <x-table.action-wrapper title="All Process">
            <x-action.button label="Add Process" label_ar="إضافة العملية" route_name="process.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Process ID" label_ar="رمز العملية" />
                <x-table.th label="Process Name" label_ar="اسم العملية" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>

            <x-table.tbody>
                @foreach ($process as $row)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$process" /></x-table.td>
                        <x-table.td>{{ $row->process_id }}</x-table.td>
                        <x-table.td>{{ $row->title }}</x-table.td>
                        <x-table.td action_col="true">
                            <a href="{{ route('resource.create', $row->id) }}"
                                class="inline-flex items-center justify-center p-1.5 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-blue-600 transition-colors">
                                <x-icons.media />
                            </a>
                            <x-action.view route_name="process.show" param="{{ $row->id }}" />
                            <x-action.edit route_name="process.edit" param="{{ $row->id }}" />
                            <x-action.delete route_name="process.destroy" param="{{ $row->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>

        <x-pagination>
            {{ $process->links() }}
        </x-pagination>
    </div>
@endsection
