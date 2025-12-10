@extends('admin.import-manager.app')
@section('title', 'Import History')
@section('title_ar', 'تاريخ الاستيراد')

@section('content')
    <x-table.action-wrapper title="Import History" title_ar="تاريخ الاستيراد">
        <x-action.button label="New Import" label_ar="استيراد جديد" route_name="imports.index" />
    </x-table.action-wrapper>
    <x-table.table>
        <x-table.thead>
            <x-table.th label="S.No." label_ar="رقم" />
            <x-table.th label="File Name" label_ar="اسم الملف" />
            <x-table.th label="Mapping" label_ar="الخريطة" />
            {{-- <x-table.th label="User" label_ar="المستخدم" /> --}}
            <x-table.th label="Status" label_ar="الحالة" />
            <x-table.th label="Rows" label_ar="الصفوف" />
            <x-table.th label="Inserted" label_ar="تم إدراجه" />
            <x-table.th label="Errors" label_ar="أخطاء" />
            <x-table.th label="Date" label_ar="التاريخ" />
            <x-table.th label="Actions" label_ar="الإجراءات" action_col="true" />
        </x-table.thead>
        <x-table.tbody>
            @forelse($jobs as $job)
            <tr>
                <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                <x-table.td>{{ $job->file_name }}</x-table.td>
                <x-table.td>{{ $job->mapping->name ?? 'N/A' }}</x-table.td>
                {{-- <x-table.td>{{ $job->user->name ?? 'Unknown' }}</x-table.td> --}}
                <x-table.td>
                    <x-status-badge :status="$job->status" />
                </x-table.td>
                <x-table.td>{{ $job->total_rows }}</x-table.td>
                <x-table.td>{{ $job->inserted_rows }}</x-table.td>
                <x-table.td>
                    @if($job->error_rows > 0)
                        <span class="text-red-600 font-medium">{{ $job->error_rows }}</span>
                    @else
                        0
                    @endif
                </x-table.td>
                <x-table.td>{{ $job->created_at->format('M d, Y H:i A') }}</x-table.td>
                <x-table.td action_col="true">
                    <x-action.view route_name="imports.history.show" param="{{ $job->id }}" />
                </x-table.td>
            </tr>
            @empty
            <tr>
                <x-table.td colspan="10" class="py-4 text-center text-sm text-gray-500">
                    No import jobs found. <a href="{{ route('imports.index') }}" class="text-indigo-600 hover:text-indigo-900">Start a new import</a>
                </x-table.td>
            </tr>
            @endforelse
        </x-table.tbody>
    </x-table.table>

    @if($jobs->hasPages())
    <div class="mt-4">
        {{ $jobs->links() }}
    </div>
    @endif
@endsection
