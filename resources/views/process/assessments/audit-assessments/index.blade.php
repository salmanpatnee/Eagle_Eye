@extends('layouts.app-full')
@section('title', 'Audit Summary')
@section('title_ar', 'ملخص مراجعة')
@section('content')
    <div>
        <x-table.action-wrapper title="Audit Summary">
            <x-action.button label="Add Audit" label_ar="إضافة  مراجعة" route_name="audit-assessments.create" />
        </x-table.action-wrapper>

        <form action="{{ route('audit-assessments.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-4-col>
                    <div>
                        <x-form.select label="Audits" label_ar="المراجعات" name="audit_id" :value="$auditId" :data="$auditNames"
                            id_key="audit_id" value_key="name" onchange="this.form.submit()" hide_keys="true" searchable />
                    </div>
                    <div>
                        <x-form.select label="Controls" label_ar="الضوابط" name="control_id" :value="$controlId"
                            :data="$controlNames" id_key="control_id" value_key="name" onchange="this.form.submit()"
                            hide_keys="true" searchable />
                    </div>
                    <div>
                        <x-form.select label="Status" label_ar="الحالة" name="status" :value="$status"
                            :data="$statusOptions" id_key="status_id" value_key="status_text"
                            onchange="this.form.submit()" hide_keys="true" />
                    </div>
                    <div>
                        <x-form.label label="Date" label_ar="تاريخ" for="start_end_date" />
                        <div class="relative">
                            <input type="date" id="start_end_date" name="start_end_date"
                                value="{{ old('start_end_date', $startEndDate) }}" class="input-field"
                                onclick="this.showPicker()" onchange="this.form.submit()" />
                            <x-icons.calendar />
                        </div>
                    </div>
                </x-form.grid-4-col>
                <div class="flex justify-center">
                    <a href="{{ route('audit-assessments.index') }}" class="action-btn text-center justify-center">Clear Filters</a>
                </div>
            </div>
        </form>

        <x-table.scroll-table>
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Audit ID" label_ar="رمز  مراجعة" />
                <x-table.th label="Audit Name" label_ar="اسم  مراجعة" />
                <x-table.th label="Start and End Date" label_ar="تاريخ بدءانتهاء" />
                <x-table.th label="No of Control Assessed" label_ar="عدد ضوابط التي تم ها" />
                <x-table.th label="Status" label_ar="الحالة" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-slot:head>
            <x-slot:body>
                @forelse ($audits as $audit)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$audits" />
                        </x-table.td>
                        <x-table.td>
                            {{ $audit->audit_id }}
                        </x-table.td>
                        <x-table.td>
                            {{ $audit->audit_name }}
                        </x-table.td>
                        <x-table.td>
                            {{ $audit->start_end_date }}
                        </x-table.td>
                        <x-table.td>
                            {{ $audit->findings->count() }}
                        </x-table.td>
                        <x-table.td>
                            <x-status-badge :status="$audit->status === 'Completed' ? 'completed' : 'in-progress'" />
                        </x-table.td>
                        <x-table.td action_col="true">
                            @if ($audit->status !== 'Completed')
                                <x-action.add route_name="audit-findings.create" param="{{ $audit->id }}" />
                            @else
                                <x-action.replicate
                                    :route="route('audit-assessments.replicate', $audit->id)"
                                    id_field="audit_id"
                                    name_field="audit_name"
                                    description_field="audit_description"
                                    id_placeholder="e.g. AUDIT-Q2-2025"
                                />
                            @endif
                            <x-action.view route_name="audit-assessments.show" param="{{ $audit->id }}" />
                            <x-action.edit route_name="audit-assessments.edit" param="{{ $audit->id }}" />
                            <x-action.delete route_name="audit-assessments.destroy" param="{{ $audit->id }}" />
                        </x-table.td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-3 py-6 text-center text-gray-500 dark:text-gray-400">No audit assessments found.</td>
                    </tr>
                @endforelse
            </x-slot:body>
        </x-table.scroll-table>

        <x-pagination>
            {{ $audits->links() }}
        </x-pagination>

    </div>
@endsection
