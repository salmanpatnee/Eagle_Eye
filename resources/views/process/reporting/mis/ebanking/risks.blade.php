@extends('layouts.mis')
@section('title', 'Management Information System Reports')
@section('title_ar', 'تقارير نظم المعلومات الإدارية')
@section('content')
    <div>
        <x-table.action-wrapper title="Risk Related to E-Banking Assets">
            <x-action.pdf-button route_name="mis-risk-e-banking-assets.index" />
        </x-table.action-wrapper>

        <x-table.scroll-table height-offset="180" min-width="900px">
            <x-slot:head>
                <x-table.th label="S.No" />
                <x-table.th label="Risk ID" label_ar="رمز المخاطر" />
                <x-table.th label="Risk Name" label_ar="اسم المخاطر" />
                <x-table.th label="Risk Group Name" label_ar="اسم مجموعة المخاطر" />
                <x-table.th label="Risk Inherent Score" label_ar="درجة المخاطر المتأصلة" />
                <x-table.th label="Risk Consequences" label_ar="عواقب المخاطر" />
            </x-slot:head>

            <x-slot:body>

                @forelse ($result as $row)
                    <tr>
                        <x-table.td class="text-center">
                            {{ $loop->index + 1 }}
                        </x-table.td>
                        <x-table.td>
                            <a href="{{ route('risks.show', $row->rid) }}">
                                {{ $row->risk_id }}
                            </a>
                        </x-table.td>
                        <x-table.td wrap="true">{{ $row->risk_name }}</x-table.td>
                        <x-table.td>{{ $row->risk_group_name }}</x-table.td>
                        <x-table.td>{{ $row->risk_inherent_score }}</x-table.td>
                        <x-table.td wrap="true">{{ $row->risk_consequences }}</x-table.td>
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table.scroll-table>
    </div>
@endsection
