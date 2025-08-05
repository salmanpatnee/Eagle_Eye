@extends('layouts.app-full')
@section('title', 'Control vs Audit Findings')
@section('title_ar', '')
@section('content')
    <div>
        <x-table.action-wrapper title="Control vs Audit Findings">
            <x-action.button label="Control vs Audit Findings" label_ar="الضوابط المتعلقة بنتائج مراجعة"
                route_name="control-vs-audit.index" disabled class="opacity-75" />
            <x-action.button label="Audit Findings vs Control" label_ar="بنتائج مراجعة المتعلقة الضوابط"
                route_name="audit-vs-control.index" />
        </x-table.action-wrapper>

        <form action="{{ route('control-vs-audit.index') }}" method="GET">
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
            </div>
        </form>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Control ID" label_ar="رمز الضوابط" />
                <x-table.th label="Control Name" label_ar="اسم الضوابط" />
                <x-table.th label="Audit Finding" label_ar="نتائج مراجعة" />
            </x-table.thead>
            <x-table.tbody>
                @forelse ($controlsWithAuditFindings as $row)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>
                            <a href="{{ route('controls.show', $row->id) }}">
                                {{ $row->control_id }}
                            </a>
                        </x-table.td>
                        <x-table.td>{{ $row->control_name }}</x-table.td>
                        <x-table.td>
                            <x-table-list :data="$row->findings" id_key="audit_finding_id" value_key="audit_finding_name" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
