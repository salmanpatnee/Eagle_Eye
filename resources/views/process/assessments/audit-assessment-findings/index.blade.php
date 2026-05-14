@extends('layouts.app-full')
@section('title', 'Audit Findings')
@section('title_ar', 'نتائج المراجعة')
@section('content')
    <div>
        <x-table.action-wrapper title="Audit Findings">
        </x-table.action-wrapper>

        <form action="{{ route('audit-findings.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-3-col>
                    <div>
                        <x-form.select label="Audit Assessment" label_ar="تقييم المراجعة" name="audit_id"
                            :value="$auditId" :data="$auditNames" id_key="audit_id" value_key="name"
                            onchange="this.form.submit()" hide_keys="true" />
                    </div>
                    <div>
                        <x-form.select label="Status" label_ar="الحالة" name="status" :value="$status"
                            :custom_data="$statuses"
                            onchange="this.form.submit()" />
                    </div>
                    <div>
                        <x-form.label label="Search" label_ar="بحث" for="search" />
                        <input type="text" id="search" name="search" value="{{ $search }}"
                            placeholder="Finding ID or Name" class="input-field" />
                    </div>
                </x-form.grid-3-col>
            </div>
        </form>

        <x-table.scroll-table>
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Finding ID" label_ar="رمز النتيجة" />
                <x-table.th label="Finding Name" label_ar="اسم النتيجة" />
                <x-table.th label="Audit" label_ar="المراجعة" />
                <x-table.th label="Status" label_ar="الحالة" />
                <x-table.th label="Action" label_ar="إجراء" />
            </x-slot:head>
            <x-slot:body>
                @forelse ($findings as $finding)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$findings" />
                        </x-table.td>
                        <x-table.td>{{ $finding->audit_finding_id }}</x-table.td>
                        <x-table.td>{{ $finding->audit_finding_name }}</x-table.td>
                        <x-table.td>{{ $finding->audit?->audit_name }}</x-table.td>
                        <x-table.td>{{ $finding->audit_finding_status }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="audit-findings.show" param="{{ $finding->id }}" />
                            <x-action.edit route_name="audit-findings.edit" param="{{ $finding->id }}" />
                            <x-action.delete route_name="audit-findings.destroy" param="{{ $finding->id }}" />
                        </x-table.td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-3 py-6 text-center text-gray-500 dark:text-gray-400">No findings found.</td>
                    </tr>
                @endforelse
            </x-slot:body>
        </x-table.scroll-table>

        <x-pagination>
            {{ $findings->links() }}
        </x-pagination>

    </div>
@endsection
