@extends('layouts.app-full')
@section('title', 'Control vs Audit Findings')
@section('title_ar', '')
@section('content')
    <div>
        <x-table.action-wrapper title="Control vs Audit Findings">
            <x-action.button label="Control vs Audit Findings" label_ar="الضوابط المتعلقة بنتائج مراجعة"
                route_name="control-vs-audit.index" />
            <x-action.button label="Audit Findings vs Control" label_ar="بنتائج مراجعة المتعلقة الضوابط"
                route_name="audit-vs-control.index" disabled class="opacity-75" />

            <x-slot:extra>
                <div>
                    <x-action.pdf-button route_name="audit-vs-control.index" />
                </div>
            </x-slot:extra>

        </x-table.action-wrapper>

        <form action="{{ route('audit-vs-control.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Controls" label_ar="الضوابط" name="control_id" placeholder="Select Control"
                            :value="$controlId" :data="$controls" id_key="control_id" value_key="control_name"
                            onchange="this.form.submit()" />
                    </div>
                    <div>
                        <x-form.select label="Findings" label_ar="بنتائج مراجعة" name="audit_finding_id"
                            placeholder="Select Findings" :value="$auditFindingId" :data="$findings" id_key="audit_finding_id"
                            value_key="audit_finding_name" onchange="this.form.submit()" />
                    </div>
                </x-form.grid-col>
                <div class="flex justify-center">
                    <a href="{{ route('audit-vs-control.index') }}" class="action-btn text-center justify-center">Clear Filters</a>
                </div>
            </div>
        </form>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Audit Finding ID" label_ar="رمز نتائج مراجعة" />
                <x-table.th label="Audit Finding Name" label_ar="اسم نتائج مراجعة" />
                <x-table.th label="Controls" label_ar="الضوابط" />
            </x-table.thead>
            <x-table.tbody>
                @forelse ($auditFindingsWithControls as $row)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>
                            <a href="{{ route('audit-findings.show', $row->id) }}">
                                {{ $row->audit_finding_id }}
                            </a>
                        </x-table.td>
                        <x-table.td> {{ $row->audit_finding_name }}</x-table.td>
                        <x-table.td>
                            <x-table-list :data="$row->controls" id_key="control_id" value_key="control_name" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
