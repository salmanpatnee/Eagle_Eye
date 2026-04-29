@extends('layouts.app-full')
@section('title', 'Risk Assessment Findings')
@section('title_ar', 'نتائج تقييم المخاطر')
@section('content')
    <div>
        <x-table.action-wrapper title="Risk Assessment Findings">
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <tr>
                    <x-table.th label="S.No" label_ar="رقم" />
                    <x-table.th label="Finding ID" label_ar="رمز النتيجة" />
                    <x-table.th label="Finding Name" label_ar="اسم النتيجة" />
                    <x-table.th label="Risk" label_ar="المخاطر" />
                    <x-table.th label="Status" label_ar="الحالة" />
                    <x-table.th label="Action" label_ar="إجراء" />
                </tr>
            </x-table.thead>
            <x-table.tbody>
                @forelse ($findings ?? [] as $finding)
                    <tr>
                        <x-table.td>{{ $loop->iteration }}</x-table.td>
                        <x-table.td>{{ $finding->risk_finding_id }}</x-table.td>
                        <x-table.td>{{ $finding->risk_finding_name }}</x-table.td>
                        <x-table.td>{{ $finding->risk?->risk_name }}</x-table.td>
                        <x-table.td>{{ $finding->implementation_status }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="risk-assessment-findings.show" param="{{ $finding->id }}" />
                            <x-action.edit route_name="risk-assessment-findings.edit" param="{{ $finding->id }}" />
                            <x-action.delete route_name="risk-assessment-findings.destroy" param="{{ $finding->id }}" />
                        </x-table.td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">No findings found.</td>
                    </tr>
                @endforelse
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
