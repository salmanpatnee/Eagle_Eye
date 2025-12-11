@extends('admin.import-manager.app')
@section('title', 'Import Mapping')
@section('title_ar', 'رسم الخرائط الاستيراد')

@section('content')
    <x-table.action-wrapper title="Import Mappings">
            <x-action.button label="Add Mapping" label_ar="إضافة خريطة" route_name="imports.mappings.create" />
        </x-table.action-wrapper>
    <x-table.table>
        <x-table.thead>
            <x-table.th label="S.No." label_ar="رقم" />
            <x-table.th label="Name" label_ar="الاسم" />
            <x-table.th label="Pivot Table" label_ar="الجدول الوسيط" />
            <x-table.th label="Left Entity" label_ar="الكيان الأول" />
            <x-table.th label="Right Entity" label_ar="الكيان الثاني" />
            {{-- <x-table.th label="Status" label_ar="الحالة" /> --}}
            <x-table.th label="Actions" label_ar="الإجراءات" action_col="true" />
        </x-table.thead>
        <x-table.tbody>
            @forelse($mappings as $mapping)
            <tr>
                <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                <x-table.td>{{ $mapping->name }}</x-table.td>
                <x-table.td>{{ $mapping->pivot_table_name }}</x-table.td>
                <x-table.td>{{ $mapping->left_entity_label }} ({{ $mapping->left_entity_table }})</x-table.td>
                <x-table.td>{{ $mapping->right_entity_label }} ({{ $mapping->right_entity_table }})</x-table.td>
                {{-- <x-table.td>
                    @if($mapping->is_active)
                        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Active</span>
                    @else
                        <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">Inactive</span>
                    @endif
                </x-table.td> --}}
                <x-table.td action_col="true">
                    <x-action.download route_name="imports.mappings.downloadTemplate" param="{{ $mapping->id }}" />
                    <x-action.edit route_name="imports.mappings.edit" param="{{ $mapping->id }}" />
                    <x-action.delete route_name="imports.mappings.destroy" param="{{ $mapping->id }}" />
                </x-table.td>
            </tr>
            @empty
            <tr>
                <x-table.td colspan="7" class="py-4 text-center text-sm text-gray-500">
                    No import mappings configured yet. <a href="{{ route('imports.mappings.create') }}" class="text-indigo-600 hover:text-indigo-900">Create one</a>
                </x-table.td>
            </tr>
            @endforelse
        </x-table.tbody>
    </x-table.table>

    @if($mappings->hasPages())
    <div class="mt-4">
        {{ $mappings->links() }}
    </div>
    @endif
@endsection
